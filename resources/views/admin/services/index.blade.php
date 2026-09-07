@extends('admin.layouts.admin')

@section('title', 'Manage Services')
@section('page-title', 'IT Services Catalog Management')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-sm text-gray-400">Configure and manage all IT solution offerings displayed on the website.</p>
        <a href="{{ route('admin.services.create') }}" class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 text-white font-semibold text-sm shadow-lg shadow-emerald-500/20 hover:from-emerald-400 hover:to-cyan-500 transition-all">
            + Add New Service
        </a>
    </div>

    <div class="glass-panel rounded-2xl p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-800 text-xs uppercase text-gray-400">
                        <th class="py-3 px-4">Order</th>
                        <th class="py-3 px-4">Icon</th>
                        <th class="py-3 px-4">Title</th>
                        <th class="py-3 px-4">Short Description</th>
                        <th class="py-3 px-4">Featured</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @forelse($services as $service)
                        <tr class="hover:bg-gray-800/30 transition-colors">
                            <td class="py-3 px-4 text-xs font-mono text-gray-400">#{{ $service->display_order }}</td>
                            <td class="py-3 px-4 font-mono text-emerald-400">{{ $service->icon }}</td>
                            <td class="py-3 px-4 font-semibold text-white">{{ $service->title }}</td>
                            <td class="py-3 px-4 text-gray-300 text-xs max-w-xs truncate">{{ $service->short_description }}</td>
                            <td class="py-3 px-4">
                                @if($service->is_featured)
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Featured</span>
                                @else
                                    <span class="text-xs text-gray-500">Standard</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                @if($service->status)
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-emerald-500/10 text-emerald-400">Active</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-xs bg-red-500/10 text-red-400">Inactive</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.services.edit', $service) }}" class="text-xs px-3 py-1.5 rounded-lg bg-gray-800 text-gray-300 hover:text-white transition-all">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-all">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-gray-500 text-sm">No services found in database.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
