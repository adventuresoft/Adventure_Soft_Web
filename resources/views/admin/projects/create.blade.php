@extends('admin.layouts.admin')

@section('title', 'Add New Project')
@section('page-title', 'Create Enterprise Project')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.projects.index') }}" class="text-xs text-gray-400 hover:text-white transition-colors">&larr; Back to Projects List</a>
    </div>

    <div class="glass-panel rounded-2xl p-8">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Project Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none"
                           placeholder="e.g., CLMS — Court Legal Management System">
                </div>

                <div>
                    <label for="client_name" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Client / Organization Name *</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none"
                           placeholder="e.g., Judicial Secretariat / Government of Bangladesh">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="category" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Category *</label>
                    <input type="text" name="category" id="category" value="{{ old('category') }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none"
                           placeholder="e.g., GovTech & Legal Tech">
                </div>

                <div>
                    <label for="project_url" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Live Project URL</label>
                    <input type="url" name="project_url" id="project_url" value="{{ old('project_url') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none"
                           placeholder="e.g., https://clms.com.bd/">
                </div>
            </div>

            <div>
                <label for="challenge" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Project Challenge / Background *</label>
                <textarea name="challenge" id="challenge" rows="3" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none"
                          placeholder="Describe the problem, complexity or challenge..."></textarea>
            </div>

            <div>
                <label for="solution" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Software Engineering Solution *</label>
                <textarea name="solution" id="solution" rows="4" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none"
                          placeholder="Describe the solution engineered by Adventure Soft..."></textarea>
            </div>

            <div>
                <label for="tech_stack" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Technologies Used (Comma Separated)</label>
                <input type="text" name="tech_stack" id="tech_stack" value="{{ old('tech_stack') }}"
                       class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none"
                       placeholder="Laravel, MySQL, Redis, Tailwind CSS, Docker">
            </div>

            <!-- Project Thumbnail / Cover (Optional) -->
            <div class="p-5 rounded-2xl bg-gray-900/60 border border-gray-800"
                 x-data="{
                    preview: null,
                    pick(e) {
                        const f = e.target.files[0];
                        if (!f) return;
                        this.preview = URL.createObjectURL(f);
                        if ($refs.url) $refs.url.value = '';
                    }
                 }">
                <label class="block text-xs font-semibold uppercase text-emerald-400 mb-2">Project Thumbnail / Showcase Image <span class="text-gray-500 normal-case font-normal">(optional)</span></label>
                <div class="flex flex-col sm:flex-row gap-6 items-start">
                    <div class="shrink-0 flex flex-col items-center space-y-2">
                        <div class="w-36 h-24 rounded-xl overflow-hidden bg-gray-800 border border-gray-700 flex items-center justify-center">
                            <template x-if="preview">
                                <img :src="preview" alt="Preview" class="w-full h-full object-cover">
                            </template>
                            <template x-if="!preview">
                                <span class="text-[10px] text-gray-500 uppercase tracking-wider">No Image</span>
                            </template>
                        </div>
                        <span class="text-[10px] text-gray-500 uppercase tracking-wider">Preview</span>
                    </div>

                    <div class="flex-1 w-full space-y-4">
                        <div>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/jpeg,image/png,image/webp" @change="pick($event)"
                                   class="w-full text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-500/20 file:text-emerald-300 hover:file:bg-emerald-500/30 cursor-pointer">
                            <p class="text-[11px] text-gray-500 mt-1.5">JPG, PNG or WEBP · max 4MB. Stored securely in <code class="text-emerald-400">storage/app/uploads/projects</code>.</p>
                            @error('thumbnail') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="thumbnail_url" class="block text-[11px] font-semibold uppercase text-cyan-400 mb-1">OR External Image URL</label>
                            <input type="url" name="thumbnail_url" id="thumbnail_url" x-ref="url" value="{{ old('thumbnail_url') }}"
                                   @input="if ($event.target.value) { preview = $event.target.value; }"
                                   class="w-full px-4 py-2.5 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-cyan-500 focus:outline-none"
                                   placeholder="https://... / image URL">
                            @error('thumbnail_url') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <label class="flex items-center space-x-2 text-sm text-gray-300 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" checked class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                    <span>Feature on Homepage</span>
                </label>

                <label class="flex items-center space-x-2 text-sm text-gray-300 cursor-pointer">
                    <input type="checkbox" name="status" value="1" checked class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                    <span>Active Status</span>
                </label>
            </div>

            <div class="pt-4 border-t border-gray-800 flex justify-end space-x-4">
                <a href="{{ route('admin.projects.index') }}" class="px-6 py-2.5 rounded-xl bg-gray-800 text-gray-300 text-sm font-semibold hover:bg-gray-700 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 text-white text-sm font-bold shadow-lg shadow-emerald-500/20 hover:from-emerald-400 hover:to-cyan-500 transition-all">
                    Save Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
