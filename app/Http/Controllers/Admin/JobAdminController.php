<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class JobAdminController extends Controller
{
    public function index()
    {
        $jobs = JobPosting::withCount('applications')->latest()->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_type' => 'required|in:full_time,part_time,contract,remote',
            'experience_level' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'nullable|boolean',
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;
        while (JobPosting::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }
        $validated['slug'] = $slug;
        $validated['status'] = $request->has('status');

        JobPosting::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting created successfully.');
    }

    public function edit($id)
    {
        $job = JobPosting::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = JobPosting::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'job_type' => 'required|in:full_time,part_time,contract,remote',
            'experience_level' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary_range' => 'nullable|string|max:255',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'nullable|boolean',
        ]);

        if ($job->title !== $validated['title']) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $counter = 1;
            while (JobPosting::where('slug', $slug)->where('id', '!=', $job->id)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
            $validated['slug'] = $slug;
        }

        $validated['status'] = $request->has('status');

        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting updated successfully.');
    }

    public function destroy($id)
    {
        $job = JobPosting::findOrFail($id);
        
        // Delete associated resume files if any
        foreach ($job->applications as $application) {
            if ($application->resume_path && Storage::disk('public')->exists($application->resume_path)) {
                Storage::disk('public')->delete($application->resume_path);
            }
        }

        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting and its candidate applications were deleted successfully.');
    }

    public function applications($id)
    {
        $job = JobPosting::with('applications')->findOrFail($id);
        return view('admin.jobs.applications', compact('job'));
    }

    public function updateApplicationStatus(Request $request, $applicationId)
    {
        $application = JobApplication::findOrFail($applicationId);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,shortlisted,rejected',
        ]);

        $application->update(['status' => $validated['status']]);

        return back()->with('success', 'Applicant status updated successfully.');
    }

    public function destroyApplication($applicationId)
    {
        $application = JobApplication::findOrFail($applicationId);

        if ($application->resume_path && Storage::disk('public')->exists($application->resume_path)) {
            Storage::disk('public')->delete($application->resume_path);
        }

        $application->delete();

        return back()->with('success', 'Candidate application removed successfully.');
    }
}
