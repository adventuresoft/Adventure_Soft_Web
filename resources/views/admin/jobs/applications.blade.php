@extends('admin.layouts.admin')

@section('title', 'Applicants — ' . $job->title)
@section('page-title', 'Applicants for: ' . $job->title)

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <a href="{{ route('admin.jobs.index') }}" class="text-xs font-semibold text-gray-400 hover:text-white flex items-center space-x-1 mb-2">
                <span>&larr; Back to All Job Openings</span>
            </a>
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-sm font-semibold text-white">{{ $job->title }}</span>
                <span class="text-xs px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">{{ $job->department }}</span>
                <span class="text-xs px-2.5 py-0.5 rounded-full bg-gray-800 text-gray-300">{{ str_replace('_', ' ', $job->job_type) }}</span>
            </div>
        </div>
        <a href="{{ route('admin.jobs.edit', $job) }}" class="text-xs px-4 py-2 rounded-xl bg-gray-800 hover:bg-gray-700 text-gray-200 border border-gray-700 transition-all self-start sm:self-auto">
            Edit Job Details
        </a>
    </div>

    <div class="glass-panel rounded-2xl p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-800 text-xs uppercase text-gray-400">
                        <th class="py-3 px-4">Applicant Name</th>
                        <th class="py-3 px-4">Contact Info</th>
                        <th class="py-3 px-4">Links / Portfolio</th>
                        <th class="py-3 px-4">Resume / CV</th>
                        <th class="py-3 px-4">Applied Date</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @forelse($job->applications as $application)
                        <tr class="hover:bg-gray-800/30 transition-colors">
                            <td class="py-4 px-4 font-semibold text-white">
                                {{ $application->applicant_name }}
                            </td>
                            <td class="py-4 px-4 text-xs space-y-0.5">
                                <span class="text-gray-300 block">{{ $application->email }}</span>
                                <span class="text-emerald-400 font-mono block">{{ $application->phone }}</span>
                            </td>
                            <td class="py-4 px-4 text-xs space-y-1">
                                @if($application->linkedin_url)
                                    <a href="{{ $application->linkedin_url }}" target="_blank" rel="noopener noreferrer" class="text-cyan-400 hover:underline flex items-center space-x-1">
                                        <span>LinkedIn ↗</span>
                                    </a>
                                @endif
                                @if($application->portfolio_url)
                                    <a href="{{ $application->portfolio_url }}" target="_blank" rel="noopener noreferrer" class="text-emerald-400 hover:underline flex items-center space-x-1">
                                        <span>Portfolio ↗</span>
                                    </a>
                                @endif
                                @if(!$application->linkedin_url && !$application->portfolio_url)
                                    <span class="text-gray-500">None provided</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-xs">
                                @if($application->resume_path)
                                    <a href="{{ asset('storage/' . $application->resume_path) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center space-x-1.5 px-3 py-1.5 rounded-lg bg-emerald-500/10 hover:bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 font-semibold transition-all">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        <span>Download CV</span>
                                    </a>
                                @else
                                    <span class="text-gray-500">No file</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 text-xs text-gray-400">
                                {{ $application->created_at->format('M d, Y') }}<br>
                                <span class="text-[10px] text-gray-500 font-mono">{{ $application->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <form action="{{ route('admin.applications.status', $application) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="text-xs px-2.5 py-1 rounded-lg bg-gray-900 border border-gray-700 font-semibold focus:outline-none focus:border-emerald-500 {{ $application->status === 'pending' ? 'text-amber-400' : ($application->status === 'shortlisted' ? 'text-emerald-400' : ($application->status === 'reviewed' ? 'text-cyan-400' : 'text-red-400')) }}">
                                        <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                        <option value="shortlisted" {{ $application->status === 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                                        <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td class="py-4 px-4 text-right">
                                <form action="{{ route('admin.applications.destroy', $application) }}" method="POST" class="inline" onsubmit="return confirm('Delete this candidate application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs px-3 py-1 rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/30 transition-all">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500 text-sm">
                                No candidate applications received for this job posting yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
