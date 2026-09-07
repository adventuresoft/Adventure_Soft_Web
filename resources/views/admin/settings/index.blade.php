@extends('admin.layouts.admin')

@section('title', 'Global Site Settings')
@section('page-title', 'Company Identity & Dynamic Configurations')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="glass-panel rounded-2xl p-8">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
            @csrf

            <h3 class="font-outfit font-bold text-lg text-white border-b border-gray-800 pb-3">Company General Information</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Company Name</label>
                    <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'Adventure Soft' }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Primary Tagline</label>
                    <input type="text" name="tagline" value="{{ $settings['tagline'] ?? '' }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Contact Phone</label>
                    <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Headquarters Address</label>
                <textarea name="office_address" rows="2" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">{{ $settings['office_address'] ?? '' }}</textarea>
            </div>

            <h3 class="font-outfit font-bold text-lg text-white border-b border-gray-800 pb-3 pt-4">Social Media & Ecosystem Links</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ $settings['linkedin_url'] ?? '' }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">GitHub URL</label>
                    <input type="url" name="github_url" value="{{ $settings['github_url'] ?? '' }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Facebook URL</label>
                    <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Twitter / X URL</label>
                    <input type="url" name="twitter_url" value="{{ $settings['twitter_url'] ?? '' }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>
            </div>

            <div class="pt-6 flex justify-end border-t border-gray-800">
                <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 text-white font-semibold text-sm shadow-lg shadow-emerald-500/20 hover:from-emerald-400 hover:to-cyan-500 transition-all">
                    Save Global Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
