@php
    /** @var \App\Models\Team|null $team */
    $team = $team ?? null;
    $socialMeta = [
        'facebook'  => ['icon' => 'fa-brands fa-facebook-f',  'placeholder' => 'https://facebook.com/username'],
        'instagram' => ['icon' => 'fa-brands fa-instagram',   'placeholder' => 'https://instagram.com/username'],
        'linkedin'  => ['icon' => 'fa-brands fa-linkedin-in', 'placeholder' => 'https://linkedin.com/in/username'],
        'youtube'   => ['icon' => 'fa-brands fa-youtube',     'placeholder' => 'https://youtube.com/@channel'],
        'github'    => ['icon' => 'fa-brands fa-github',      'placeholder' => 'https://github.com/username'],
        'pinterest' => ['icon' => 'fa-brands fa-pinterest',   'placeholder' => 'https://pinterest.com/username'],
        'twitter'   => ['icon' => 'fa-brands fa-x-twitter',   'placeholder' => 'https://x.com/username'],
    ];
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">

<!-- Profile Photo -->
<div class="p-5 rounded-2xl bg-gray-900/60 border border-gray-800"
     x-data="{
        preview: @js($team?->photo_url),
        removed: false,
        pick(e) {
            const f = e.target.files[0];
            if (!f) return;
            this.preview = URL.createObjectURL(f);
            this.removed = false;
            $refs.url.value = '';
        }
     }">
    <div class="flex flex-col sm:flex-row gap-6 items-start">
        <!-- Live Preview (matches website card avatar) -->
        <div class="shrink-0 flex flex-col items-center space-y-2">
            <div class="w-28 h-28 rounded-full p-[3px] bg-gradient-to-br from-[#6abf4b] to-[#2e7d32] shadow-lg shadow-emerald-900/40">
                <template x-if="preview && !removed">
                    <img :src="preview" alt="Preview" class="w-full h-full rounded-full object-cover object-top border-[3px] border-gray-900">
                </template>
                <template x-if="!preview || removed">
                    <div class="w-full h-full rounded-full bg-gray-800 border-[3px] border-gray-900 flex items-center justify-center text-gray-500 text-[10px] uppercase tracking-wider">No Photo</div>
                </template>
            </div>
            <span class="text-[10px] text-gray-500 uppercase tracking-wider">Live Preview</span>
        </div>

        <div class="flex-1 w-full space-y-4">
            <div>
                <label for="photo" class="block text-xs font-semibold uppercase text-emerald-400 mb-2">
                    {{ $team ? 'Replace Profile Picture' : 'Upload Profile Picture' }}
                </label>
                <input type="file" name="photo" id="photo" accept="image/jpeg,image/png,image/webp" @change="pick($event)"
                       class="w-full text-xs text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-500/20 file:text-emerald-300 hover:file:bg-emerald-500/30 cursor-pointer">
                <p class="text-[11px] text-gray-500 mt-1.5">JPG, PNG or WEBP · max 4MB · square (1:1) photo recommended, e.g. 600×600px. Stored securely in <code class="text-emerald-400">storage/app/uploads/teams</code>.</p>
                @error('photo') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="photo_url" class="block text-xs font-semibold uppercase text-cyan-400 mb-2">OR Image URL</label>
                <input type="url" name="photo_url" id="photo_url" x-ref="url" value="{{ old('photo_url') }}"
                       @input="if ($event.target.value) { preview = $event.target.value; removed = false; }"
                       class="w-full px-4 py-2.5 rounded-xl bg-gray-900 border border-gray-700 text-white text-sm focus:border-cyan-500 focus:outline-none"
                       placeholder="https://...">
                @error('photo_url') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            @if($team && $team->photo)
                <label class="inline-flex items-center space-x-2 text-xs text-gray-400 cursor-pointer">
                    <input type="checkbox" name="remove_photo" value="1" x-model="removed" class="rounded border-gray-700 bg-gray-900 text-red-500">
                    <span>Remove current photo</span>
                </label>
            @endif
        </div>
    </div>
</div>

<!-- Social Links -->
<div class="space-y-3">
    <div class="flex items-center justify-between">
        <h4 class="text-xs font-semibold uppercase text-gray-300">Social Profiles</h4>
        <span class="text-[11px] text-gray-500">Only filled links are shown on the website</span>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        @foreach(\App\Models\Team::SOCIAL_NETWORKS as $key => $label)
            <div>
                <label for="{{ $key }}" class="sr-only">{{ $label }}</label>
                <div class="flex items-center rounded-xl bg-gray-900 border border-gray-800 focus-within:border-emerald-500 transition-colors">
                    <span class="w-10 h-10 shrink-0 flex items-center justify-center text-gray-400 border-r border-gray-800" title="{{ $label }}">
                        <i class="{{ $socialMeta[$key]['icon'] }}"></i>
                    </span>
                    <input type="url" name="{{ $key }}" id="{{ $key }}"
                           value="{{ old($key, $team?->social_links[$key] ?? '') }}"
                           class="flex-1 min-w-0 px-3 py-2 bg-transparent text-white text-xs focus:outline-none"
                           placeholder="{{ $socialMeta[$key]['placeholder'] }}">
                </div>
                @error($key) <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
        @endforeach
    </div>
</div>
