<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'photo_url' => 'nullable|url|max:500',
            'bio' => 'required|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'twitter' => 'nullable|url',
            'display_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        // Handle Photo Upload or URL
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teams', 'public');
            $validated['photo'] = asset('storage/' . $path);
        } elseif ($request->filled('photo_url')) {
            $validated['photo'] = $request->photo_url;
        } else {
            $validated['photo'] = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80';
        }

        $validated['department'] = ($request->department === 'Custom' && $request->filled('department_custom')) 
            ? $request->department_custom 
            : ($request->department ?: 'CEO & Founder');

        $validated['social_links'] = [
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'twitter' => $request->twitter,
        ];
        $validated['display_order'] = $validated['display_order'] ?? 1;
        $validated['status'] = $request->has('status');

        Team::create($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team member added successfully.');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'photo_url' => 'nullable|url|max:500',
            'bio' => 'required|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'twitter' => 'nullable|url',
            'display_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teams', 'public');
            $validated['photo'] = asset('storage/' . $path);
        } elseif ($request->filled('photo_url')) {
            $validated['photo'] = $request->photo_url;
        }

        $validated['department'] = ($request->department === 'Custom' && $request->filled('department_custom')) 
            ? $request->department_custom 
            : ($request->department ?: 'CEO & Founder');

        $validated['social_links'] = [
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'twitter' => $request->twitter,
        ];
        $validated['display_order'] = $validated['display_order'] ?? 1;
        $validated['status'] = $request->has('status');

        $team->update($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team member details updated successfully.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'Engineering leader removed successfully.');
    }
}
