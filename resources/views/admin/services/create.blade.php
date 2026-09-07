@extends('admin.layouts.admin')

@section('title', 'Add New Service')
@section('page-title', 'Create New IT Solution Offering')

@section('content')
<div class="max-w-4xl space-y-6">
    <div class="glass-panel rounded-2xl p-8">
        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Service Title</label>
                    <input type="text" name="title" required value="{{ old('title') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                           placeholder="e.g. Enterprise Custom Software">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Icon Symbol (Lucide/HeroIcon)</label>
                    <input type="text" name="icon" required value="{{ old('icon') }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                           placeholder="e.g. code-bracket, globe-alt, sparkles">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Short Description (Summary Card)</label>
                <textarea name="short_description" rows="3" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                          placeholder="Brief 1-2 sentence overview for home page cards...">{{ old('short_description') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Full Detailed Description</label>
                <textarea name="long_description" rows="6" required
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                          placeholder="Exhaustive service capabilities, workflow, and technologies used...">{{ old('long_description') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Service Features (One feature per line)</label>
                <textarea name="features" rows="4"
                          class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm"
                          placeholder="Microservices Architecture&#10;High Concurrency Processing&#10;SOC2 Compliance">{{ old('features') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                <div>
                    <label class="block text-xs font-semibold uppercase text-gray-300 mb-2">Display Order</label>
                    <input type="number" name="display_order" value="{{ old('display_order', 1) }}"
                           class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-700 text-white focus:outline-none focus:border-emerald-500 text-sm">
                </div>

                <div class="flex items-center space-x-3 pt-6">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" checked class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                    <label for="is_featured" class="text-sm text-gray-300 cursor-pointer">Show on Home Page</label>
                </div>

                <div class="flex items-center space-x-3 pt-6">
                    <input type="checkbox" name="status" id="status" value="1" checked class="rounded border-gray-700 bg-gray-900 text-emerald-500">
                    <label for="status" class="text-sm text-gray-300 cursor-pointer">Active Service</label>
                </div>
            </div>

            <div class="pt-4 flex items-center justify-end space-x-4 border-t border-gray-800">
                <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 rounded-xl text-gray-400 hover:text-white text-sm">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 text-white font-semibold text-sm shadow-lg shadow-emerald-500/20 hover:from-emerald-400 hover:to-cyan-500 transition-all">
                    Save Service
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
