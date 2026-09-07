@extends('admin.layouts.admin')

@section('title', 'Edit Engineering Leader')
@section('page-title', 'Edit Engineering Leader Details')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.teams.index') }}" class="text-xs text-gray-400 hover:text-white transition-colors">&larr; Back to Team List</a>
    </div>

    <div class="glass-panel rounded-2xl p-8">
        <form action="{{ route('admin.teams.update', $team->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6" x-data="{
                dept: '{{ old('department', $team->department) }}',
                designation: '{{ old('designation', $team->designation) }}',
                setPreset(d, r) {
                    this.dept = d;
                    if(r) this.designation = r;
                }
            }">
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Full Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $team->name) }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label for="department" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Department / Category *</label>
                    <div class="space-y-2">
                        <select name="department" id="department" x-model="dept" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none cursor-pointer">
                            <option value="CEO & Founder">👑 CEO & Founder</option>
                            <option value="Executive Leadership">👔 Executive Leadership</option>
                            <option value="Digital Marketing">📈 Digital Marketing & Growth</option>
                            <option value="Software Engineering">💻 Software Engineering</option>
                            <option value="UI/UX & Product Design">🎨 UI/UX & Product Design</option>
                            <option value="Operations & HR">🏢 Operations & Human Resources</option>
                            <option value="Custom">✏️ Custom Department...</option>
                        </select>
                        <template x-if="dept === 'Custom' || !['CEO & Founder', 'Executive Leadership', 'Digital Marketing', 'Software Engineering', 'UI/UX & Product Design', 'Operations & HR'].includes(dept)">
                            <input type="text" name="department_custom" :value="dept" placeholder="Enter custom department name..." class="w-full px-4 py-2.5 rounded-xl bg-gray-900 border border-emerald-500 text-white text-xs focus:outline-none" @input="dept = $event.target.value">
                        </template>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="designation" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Role / Designation *</label>
                    <input type="text" name="designation" id="designation" x-model="designation" list="designation-suggestions-edit" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">
                    
                    <datalist id="designation-suggestions-edit">
                        <option value="Founder & Chief Executive Officer (CEO)">
                        <option value="Co-Founder & Managing Director">
                        <option value="Chief Technology Officer (CTO)">
                        <option value="Executive Director">
                        <option value="Head of Digital Marketing">
                        <option value="Digital Marketing Executive">
                        <option value="SEO & Growth Strategist">
                        <option value="Social Media Marketing Specialist">
                        <option value="Content & Brand Strategist">
                        <option value="Lead Software Engineer">
                        <option value="Senior Full-Stack Developer">
                        <option value="Lead UI/UX & Product Designer">
                    </datalist>

                    <!-- Quick Preset Badges -->
                    <div class="flex flex-wrap gap-2 pt-2.5 items-center">
                        <span class="text-[10px] uppercase font-bold text-gray-500">Quick Select:</span>
                        <button type="button" @click="setPreset('CEO & Founder', 'Founder & Chief Executive Officer (CEO)')" class="text-[11px] px-2.5 py-1 rounded-lg bg-emerald-500/10 text-emerald-300 border border-emerald-500/30 hover:bg-emerald-500/20 transition-all">👑 CEO & Founder</button>
                        <button type="button" @click="setPreset('Executive Leadership', 'Executive Director / Operations Head')" class="text-[11px] px-2.5 py-1 rounded-lg bg-cyan-500/10 text-cyan-300 border border-cyan-500/30 hover:bg-cyan-500/20 transition-all">👔 Executive</button>
                        <button type="button" @click="setPreset('Digital Marketing', 'Digital Marketing Executive / SEO Lead')" class="text-[11px] px-2.5 py-1 rounded-lg bg-purple-500/10 text-purple-300 border border-purple-500/30 hover:bg-purple-500/20 transition-all">📈 Digital Marketing</button>
                        <button type="button" @click="setPreset('Software Engineering', 'Senior Software Engineer / Tech Lead')" class="text-[11px] px-2.5 py-1 rounded-lg bg-amber-500/10 text-amber-300 border border-amber-500/30 hover:bg-amber-500/20 transition-all">💻 Engineering</button>
                    </div>
                </div>

                <div>
                    <label for="display_order" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Display Order</label>
                    <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $team->display_order) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">
                </div>
            </div>

            <!-- Current Photo Preview & Replacement Options -->
            <div class="p-4 rounded-2xl bg-gray-900/60 border border-gray-800 space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 rounded-full bg-gray-800 border border-gray-700 overflow-hidden shrink-0">
                        <img src="{{ $team->photo }}" alt="{{ $team->name }}" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <span class="text-xs text-gray-400 block">Current Profile Picture</span>
                        <span class="text-xs text-emerald-400 font-mono truncate max-w-md block">{{ $team->photo }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-gray-800">
                    <div>
                        <label for="photo" class="block text-xs font-semibold uppercase text-emerald-400 mb-2">Replace with New File</label>
                        <input type="file" name="photo" id="photo" accept="image/*"
                               class="w-full text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-500/20 file:text-emerald-300 hover:file:bg-emerald-500/30">
                    </div>

                    <div>
                        <label for="photo_url" class="block text-xs font-semibold uppercase text-cyan-400 mb-2">OR Replace with Image URL</label>
                        <input type="url" name="photo_url" id="photo_url" value="{{ old('photo_url') }}"
                               class="w-full px-4 py-2.5 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-cyan-500 focus:outline-none"
                               placeholder="https://images.unsplash.com/photo-...">
                    </div>
                </div>
            </div>

            <div>
                <label for="bio" class="block text-xs font-semibold uppercase text-gray-300 mb-2">Bio / Details *</label>
                <textarea name="bio" id="bio" rows="4" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-emerald-500 focus:outline-none">{{ old('bio', $team->bio) }}</textarea>
            </div>

            <!-- Social Links -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label for="linkedin" class="block text-xs font-semibold text-gray-400 mb-1">LinkedIn Profile</label>
                    <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', $team->social_links['linkedin'] ?? '') }}"
                           class="w-full px-3 py-2 rounded-xl bg-gray-900 border border-gray-800 text-white text-xs">
                </div>

                <div>
                    <label for="github" class="block text-xs font-semibold text-gray-400 mb-1">GitHub Profile</label>
                    <input type="url" name="github" id="github" value="{{ old('github', $team->social_links['github'] ?? '') }}"
                           class="w-full px-3 py-2 rounded-xl bg-gray-900 border border-gray-800 text-white text-xs">
                </div>

                <div>
                    <label for="twitter" class="block text-xs font-semibold text-gray-400 mb-1">Twitter / X</label>
                    <input type="url" name="twitter" id="twitter" value="{{ old('twitter', $team->social_links['twitter'] ?? '') }}"
                           class="w-full px-3 py-2 rounded-xl bg-gray-900 border border-gray-800 text-white text-xs">
                </div>
            </div>

            <div class="flex items-center space-x-6">
                <label class="flex items-center space-x-2 text-sm text-gray-300 cursor-pointer">
                    <input type="checkbox" name="status" value="1" {{ $team->status ? 'checked' : '' }} class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                    <span>Active Status (Show on Website)</span>
                </label>
            </div>

            <div class="pt-4 border-t border-gray-800 flex justify-end space-x-4">
                <a href="{{ route('admin.teams.index') }}" class="px-6 py-2.5 rounded-xl bg-gray-800 text-gray-300 text-sm font-semibold hover:bg-gray-700 transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 text-white text-sm font-bold shadow-lg shadow-emerald-500/20 hover:from-emerald-400 hover:to-cyan-500 transition-all">
                    Update Engineering Leader
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
