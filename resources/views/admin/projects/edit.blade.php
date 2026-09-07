@extends('admin.layouts.admin')

@section('title', 'Edit Project')
@section('page-title', 'Edit Enterprise Project')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.projects.index') }}" class="text-xs text-gray-400 hover:text-white transition-colors">&larr; Back to Projects List</a>
    </div>

    <div class="glass-panel rounded-2xl p-8">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Project Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label for="client_name" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Client / Organization Name *</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $project->client_name) }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="category" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Category *</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $project->category) }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label for="project_url" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Live Project URL</label>
                    <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $project->project_url) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">
                </div>
            </div>

            <div>
                <label for="challenge" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Project Challenge / Background *</label>
                <textarea name="challenge" id="challenge" rows="3" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">{{ old('challenge', $project->challenge) }}</textarea>
            </div>

            <div>
                <label for="solution" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Software Engineering Solution *</label>
                <textarea name="solution" id="solution" rows="4" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">{{ old('solution', $project->solution) }}</textarea>
            </div>

            <div>
                <label for="tech_stack" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Technologies Used (Comma Separated)</label>
                <input type="text" name="tech_stack" id="tech_stack" value="{{ old('tech_stack', is_array($project->tech_stack) ? implode(', ', $project->tech_stack) : $project->tech_stack) }}"
                       class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">
            </div>

            <div class="flex items-center space-x-6">
                <label class="flex items-center space-x-2 text-sm text-gray-300 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ $project->is_featured ? 'checked' : '' }} class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                    <span>Feature on Homepage</span>
                </label>

                <label class="flex items-center space-x-2 text-sm text-gray-300 cursor-pointer">
                    <input type="checkbox" name="status" value="1" {{ $project->status ? 'checked' : '' }} class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                    <span>Active Status</span>
                </label>
            </div>

            <div class="pt-4 border-t border-gray-800 flex justify-end space-x-4">
                <a href="{{ route('admin.projects.index') }}" class="px-6 py-2.5 rounded-xl bg-gray-800 text-gray-300 text-sm font-semibold hover:bg-gray-700 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 text-white text-sm font-bold shadow-lg shadow-emerald-500/20 hover:from-emerald-400 hover:to-cyan-500 transition-all">
                    Update Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
