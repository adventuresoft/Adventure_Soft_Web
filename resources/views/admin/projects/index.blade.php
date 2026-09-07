@extends('admin.layouts.admin')

@section('title', 'Manage Projects')
@section('page-title', 'Enterprise Projects Showcase Management')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-400">Add, edit, or manage high-profile projects displayed on the public website.</p>
        <a href="{{ route('admin.projects.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 text-white font-semibold text-sm shadow-lg shadow-emerald-500/20 hover:from-emerald-400 hover:to-cyan-500 transition-all">
            + Add New Project
        </a>
    </div>

    <div class="glass-panel rounded-2xl p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-800 text-xs uppercase text-gray-400">
                        <th class="py-3 px-4">Project Title</th>
                        <th class="py-3 px-4">Client / Org</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Project URL</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @forelse($projects as $project)
                        <tr class="hover:bg-gray-800/30 transition-colors">
                            <td class="py-3 px-4 font-semibold text-white">
                                <a href="{{ route('projects.show', $project->slug) }}" target="_blank" class="hover:text-emerald-400 transition-colors">
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td class="py-3 px-4 text-xs font-mono text-gray-300">{{ $project->client_name }}</td>
                            <td class="py-3 px-4 text-xs">
                                <span class="px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-medium">
                                    {{ $project->category }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-xs font-mono text-cyan-400">
                                @if(!empty($project->project_url))
                                    <a href="{{ $project->project_url }}" target="_blank" class="hover:underline flex items-center space-x-1">
                                        <span>{{ parse_url($project->project_url, PHP_URL_HOST) }}</span>
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                @else
                                    <span class="text-gray-500">N/A</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                @if($project->status)
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-emerald-500/10 text-emerald-400">Active</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-red-500/10 text-red-400">Inactive</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-xs px-3 py-1.5 rounded-lg bg-gray-800 text-gray-300 hover:text-white transition-all">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-all">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-500 text-sm">No projects found. Click "+ Add New Project" to add one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
