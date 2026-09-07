@extends('admin.layouts.admin')

@section('title', 'Edit Job Opening')
@section('page-title', 'Edit: ' . $job->title)

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.jobs.index') }}" class="text-xs font-semibold text-gray-400 hover:text-white flex items-center space-x-1">
            <span>&larr; Back to Job Openings</span>
        </a>
        <a href="{{ route('admin.jobs.applications', $job) }}" class="text-xs px-3 py-1.5 rounded-lg bg-cyan-500/10 text-cyan-400 border border-cyan-500/30 hover:bg-cyan-500/20 transition-all">
            View Applications ({{ $job->applications->count() }})
        </a>
    </div>

    <div class="glass-panel rounded-2xl p-8">
        <form action="{{ route('admin.jobs.update', $job) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Job Title *</label>
                    <input type="text" name="title" required value="{{ old('title', $job->title) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Department *</label>
                    <input type="text" name="department" required value="{{ old('department', $job->department) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Employment Type *</label>
                    <select name="job_type" required class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                        <option value="full_time" {{ old('job_type', $job->job_type) === 'full_time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part_time" {{ old('job_type', $job->job_type) === 'part_time' ? 'selected' : '' }}>Part Time</option>
                        <option value="contract" {{ old('job_type', $job->job_type) === 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="remote" {{ old('job_type', $job->job_type) === 'remote' ? 'selected' : '' }}>Remote</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Experience Level *</label>
                    <input type="text" name="experience_level" required value="{{ old('experience_level', $job->experience_level) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Application Deadline *</label>
                    <input type="date" name="deadline" required value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d') : '') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Location *</label>
                    <input type="text" name="location" required value="{{ old('location', $job->location) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Salary Range / Compensation</label>
                    <input type="text" name="salary_range" value="{{ old('salary_range', $job->salary_range) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Role Overview & Description *</label>
                <textarea name="description" rows="4" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">{{ old('description', $job->description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Technical Skills & Requirements *</label>
                <textarea name="requirements" rows="6" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">{{ old('requirements', $job->requirements) }}</textarea>
            </div>

            <div class="flex items-center space-x-3 pt-2">
                <input type="checkbox" name="status" id="status" value="1" {{ old('status', $job->status) ? 'checked' : '' }} class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                <label for="status" class="text-sm text-gray-300 cursor-pointer">Role is Active and visible on Careers page</label>
            </div>

            <div class="pt-4 border-t border-gray-800 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.jobs.index') }}" class="px-6 py-2.5 rounded-xl bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-semibold transition-all">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 hover:from-emerald-400 hover:to-cyan-500 text-white text-sm font-semibold shadow-lg shadow-emerald-500/20 transition-all">
                    Update Job Opening
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
