@extends('admin.layouts.admin')

@section('title', 'Add New Job Opening')
@section('page-title', 'Create Engineering Job Posting')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.jobs.index') }}" class="text-xs font-semibold text-gray-400 hover:text-white flex items-center space-x-1">
            <span>&larr; Back to Job Openings</span>
        </a>
    </div>

    <div class="glass-panel rounded-2xl p-8">
        <form action="{{ route('admin.jobs.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Job Title *</label>
                    <input type="text" name="title" required value="{{ old('title') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                           placeholder="e.g. Senior Laravel / Full-Stack Engineer">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Department *</label>
                    <input type="text" name="department" required value="{{ old('department') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                           placeholder="e.g. Backend Engineering, Mobile Development, AI/ML">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Employment Type *</label>
                    <select name="job_type" required class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                        <option value="full_time" {{ old('job_type') === 'full_time' ? 'selected' : '' }}>Full Time</option>
                        <option value="part_time" {{ old('job_type') === 'part_time' ? 'selected' : '' }}>Part Time</option>
                        <option value="contract" {{ old('job_type') === 'contract' ? 'selected' : '' }}>Contract</option>
                        <option value="remote" {{ old('job_type') === 'remote' ? 'selected' : '' }}>Remote</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Experience Level *</label>
                    <input type="text" name="experience_level" required value="{{ old('experience_level', 'Mid to Senior (3-5+ Years)') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                           placeholder="e.g. Senior (4-6+ Yrs), Mid-Level (2-4 Yrs)">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Application Deadline *</label>
                    <input type="date" name="deadline" required value="{{ old('deadline', now()->addDays(30)->format('Y-m-d')) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Location *</label>
                    <input type="text" name="location" required value="{{ old('location', 'Dhaka, Bangladesh (Hybrid / On-site)') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                           placeholder="e.g. Dhaka, Bangladesh (Hybrid) or Remote">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Salary Range / Compensation</label>
                    <input type="text" name="salary_range" value="{{ old('salary_range') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                           placeholder="e.g. ৳ 90,000 - ৳ 140,000 / mo or Negotiable">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Role Overview & Description *</label>
                <textarea name="description" rows="4" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                          placeholder="Provide a clear description of the responsibilities, project scope, and daily engineering tasks...">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Technical Skills & Requirements *</label>
                <textarea name="requirements" rows="6" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                          placeholder="- 4+ years hands-on production experience with Laravel and PHP 8.x&#10;- Solid understanding of REST APIs, MySQL optimization, and Redis caching&#10;- Experience with Docker containerization and AWS deployments&#10;- Strong problem-solving and team communication skills">{{ old('requirements') }}</textarea>
            </div>

            <div class="flex items-center space-x-3 pt-2">
                <input type="checkbox" name="status" id="status" value="1" checked class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                <label for="status" class="text-sm text-gray-300 cursor-pointer">Publish immediately on Careers page (Active Hiring)</label>
            </div>

            <div class="pt-4 border-t border-gray-800 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.jobs.index') }}" class="px-6 py-2.5 rounded-xl bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-semibold transition-all">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 hover:from-emerald-400 hover:to-cyan-500 text-white text-sm font-semibold shadow-lg shadow-emerald-500/20 transition-all">
                    Publish Job Opening
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
