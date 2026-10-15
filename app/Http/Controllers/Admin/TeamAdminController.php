<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamAdminController extends Controller
{
    public function index()
    {
        $members = Team::orderBy('display_order', 'asc')->get();
        return view('admin.teams.index', compact('members'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        // Photo: uploaded file (stored outside /public) OR external URL
        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->storePhoto($request);
        } elseif ($request->filled('photo_url')) {
            $validated['photo'] = $request->photo_url;
        } else {
            $validated['photo'] = null;
        }

        $validated = $this->applyCommonFields($request, $validated);

        Team::create($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team member added successfully.');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $this->validateRequest($request);

        if ($request->hasFile('photo')) {
            $team->deleteUploadedPhoto();
            $validated['photo'] = $this->storePhoto($request);
        } elseif ($request->filled('photo_url')) {
            $team->deleteUploadedPhoto();
            $validated['photo'] = $request->photo_url;
        } elseif ($request->boolean('remove_photo')) {
            $team->deleteUploadedPhoto();
            $validated['photo'] = null;
        } else {
            unset($validated['photo']); // keep existing photo
        }

        $validated = $this->applyCommonFields($request, $validated);

        $team->update($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team member details updated successfully.');
    }

    public function destroy(Team $team)
    {
        $team->deleteUploadedPhoto();
        $team->delete();

        return redirect()->route('admin.teams.index')->with('success', 'Team member removed successfully.');
    }

    /* ------------------------------------------------------------------ */

    protected function validateRequest(Request $request): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'photo_url' => 'nullable|url|max:500',
            'bio' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ];

        foreach (array_keys(Team::SOCIAL_NETWORKS) as $network) {
            $rules[$network] = 'nullable|url|max:500';
        }

        return $request->validate($rules);
    }

    /** Save the uploaded photo to storage/app/uploads/teams and return its relative path. */
    protected function storePhoto(Request $request): string
    {
        $file = $request->file('photo');
        $name = Str::slug($request->input('name', 'member')) . '-' . Str::random(10) . '.' . $file->extension();

        return $file->storeAs('teams', $name, 'uploads');
    }

    protected function applyCommonFields(Request $request, array $validated): array
    {
        $validated['department'] = ($request->department === 'Custom' && $request->filled('department_custom'))
            ? $request->department_custom
            : ($request->department ?: 'Executive Leadership');

        $social = [];
        foreach (array_keys(Team::SOCIAL_NETWORKS) as $network) {
            $social[$network] = $request->input($network) ?: null;
            unset($validated[$network]);
        }
        $validated['social_links'] = $social;

        unset($validated['photo_url']);
        $validated['display_order'] = $validated['display_order'] ?? 1;
        $validated['status'] = $request->has('status');

        return $validated;
    }
}
