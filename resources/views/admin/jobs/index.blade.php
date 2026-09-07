@extends('admin.layouts.admin')

@section('title', 'Manage Job Postings')
@section('page-title', 'Careers & Job Openings Management')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <p class="text-sm text-gray-400">Publish, modify, and manage open technical roles visible on the Careers portal.</p>
        </div>
        <a href="{{ route('admin.jobs.create') }}" class="inline-flex items-center space-x-2 px-4 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 hover:from-emerald-400 hover:to-cyan-500 text-white font-semibold text-sm shadow-lg shadow-emerald-500/20 transition-all shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>+ Add New Job Opening</span>
        </a>
    </div>

    <div class="glass-panel rounded-2xl p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-800 text-xs uppercase text-gray-400">
                        <th class="py-3 px-4">Role Title</th>
                        <th class="py-3 px-4">Department</th>
                        <th class="py-3 px-4">Type & Exp</th>
                        <th class="py-3 px-4">Location / Salary</th>
                        <th class="py-3 px-4">Deadline</th>
                        <th class="py-3 px-4">Applicants</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @forelse($jobs as $job)
                        <tr class="hover:bg-gray-800/30 transition-colors">
                            <td class="py-4 px-4">
                                <span class="font-semibold text-white block">{{ $job->title }}</span>
                                <span class="text-xs text-gray-500 font-mono">/careers#job-{{ $job->id }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="px-2.5 py-1 rounded-md text-xs font-medium bg-gray-800 text-cyan-300 border border-gray-700">
                                    {{ $job->department }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-xs space-y-1">
                                <span class="px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 font-semibold uppercase block w-fit">
                                    {{ str_replace('_', ' ', $job->job_type) }}
                                </span>
                                <span class="text-gray-400 block">{{ $job->experience_level }}</span>
                            </td>
                            <td class="py-4 px-4 text-xs">
                                <span class="text-gray-300 block">{{ $job->location }}</span>
                                <span class="text-emerald-400 font-mono block mt-0.5">{{ $job->salary_range ?? 'Negotiable' }}</span>
                            </td>
                            <td class="py-4 px-4 text-xs">
                                <span class="{{ $job->deadline < now() ? 'text-red-400 font-semibold' : 'text-gray-300' }}">
                                    {{ $job->deadline ? $job->deadline->format('M d, Y') : 'N/A' }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <a href="{{ route('admin.jobs.applications', $job) }}" class="inline-flex items-center space-x-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-cyan-500/10 hover:bg-cyan-500/20 text-cyan-400 border border-cyan-500/30 transition-all">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    <span>{{ $job->applications_count }} Candidate(s)</span>
                                </a>
                            </td>
                            <td class="py-4 px-4">
                                @if($job->status)
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                        Active / Hiring
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-red-500/10 text-red-400 border border-red-500/30">
                                        Closed / Hidden
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.jobs.edit', $job) }}" class="text-xs px-3 py-1.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-gray-200 border border-gray-700 transition-all">
                                    Edit
                                </a>
                                <form action="{{ route('admin.jobs.destroy', $job) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this job posting and all related applications?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/30 transition-all">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-12 text-center text-gray-500 text-sm">
                                No job postings created yet. Click <a href="{{ route('admin.jobs.create') }}" class="text-emerald-400 underline">+ Add New Job Opening</a> to publish your first role.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
