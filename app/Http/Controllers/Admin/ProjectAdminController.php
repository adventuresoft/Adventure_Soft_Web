<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectAdminController extends Controller
{
    public function index()
    {
        $projects = Portfolio::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'challenge' => 'required|string',
            'solution' => 'required|string',
            'tech_stack' => 'nullable|string', // comma or newline separated
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'thumbnail_url' => 'nullable|url|max:500',
            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['title']);
        $validated['tech_stack'] = $request->filled('tech_stack')
            ? array_filter(array_map('trim', explode(',', $request->tech_stack)))
            : ['Laravel', 'MySQL', 'Tailwind CSS'];
        
        $validated['impact_metrics'] = [
            'Status' => 'Active Production',
            'Architecture' => 'Enterprise Grade',
        ];
        
        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $request->has('status');

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = Str::slug($validated['title']) . '-' . Str::random(10) . '.' . $file->extension();
            $validated['thumbnail'] = $file->storeAs('projects', $name, 'uploads');
        } elseif ($request->filled('thumbnail_url')) {
            $validated['thumbnail'] = $request->thumbnail_url;
        } else {
            $validated['thumbnail'] = null;
        }
        unset($validated['thumbnail_url']);

        Portfolio::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Portfolio::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Portfolio::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'project_url' => 'nullable|url|max:255',
            'challenge' => 'required|string',
            'solution' => 'required|string',
            'tech_stack' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'thumbnail_url' => 'nullable|url|max:500',
            'is_featured' => 'nullable|boolean',
            'status' => 'nullable|boolean',
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['title'], $project->id);
        $validated['tech_stack'] = $request->filled('tech_stack')
            ? array_filter(array_map('trim', explode(',', $request->tech_stack)))
            : ['Laravel', 'MySQL'];
        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $request->has('status');

        if ($request->hasFile('thumbnail')) {
            $project->deleteUploadedThumbnail();
            $file = $request->file('thumbnail');
            $name = Str::slug($validated['title']) . '-' . Str::random(10) . '.' . $file->extension();
            $validated['thumbnail'] = $file->storeAs('projects', $name, 'uploads');
        } elseif ($request->filled('thumbnail_url')) {
            $project->deleteUploadedThumbnail();
            $validated['thumbnail'] = $request->thumbnail_url;
        } elseif ($request->boolean('remove_thumbnail')) {
            $project->deleteUploadedThumbnail();
            $validated['thumbnail'] = null;
        } else {
            unset($validated['thumbnail']);
        }
        unset($validated['thumbnail_url']);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Portfolio::findOrFail($id);
        $project->deleteUploadedThumbnail();
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title) ?: 'project';
        $slug = $baseSlug;
        $counter = 1;

        while (Portfolio::where('slug', $slug)->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = "{$baseSlug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
