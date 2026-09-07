@extends('admin.layouts.admin')

@section('title', 'Manage Client Inquiries')
@section('page-title', 'Client Contact Submissions & Leads')

@section('content')
<div class="space-y-6">
    <div class="glass-panel rounded-2xl p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-800 text-xs uppercase text-gray-400">
                        <th class="py-3 px-4">Client</th>
                        <th class="py-3 px-4">Contact Info</th>
                        <th class="py-3 px-4">Service</th>
                        <th class="py-3 px-4">Budget</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Date</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @forelse($inquiries as $inquiry)
                        <tr class="hover:bg-gray-800/30 transition-colors">
                            <td class="py-3 px-4">
                                <span class="font-semibold text-white block">{{ $inquiry->name }}</span>
                                <span class="text-xs text-gray-400">{{ $inquiry->company_name ?? 'Individual Client' }}</span>
                            </td>
                            <td class="py-3 px-4">
                                <span class="text-gray-300 block text-xs">{{ $inquiry->email }}</span>
                                <span class="text-xs text-gray-500">{{ $inquiry->phone ?? 'N/A' }}</span>
                            </td>
                            <td class="py-3 px-4 text-emerald-400 text-xs font-medium">{{ $inquiry->service_requested ?? 'General Inquiry' }}</td>
                            <td class="py-3 px-4 text-gray-300 text-xs">{{ $inquiry->estimated_budget ?? 'Undisclosed' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $inquiry->status === 'new' ? 'bg-purple-500/20 text-purple-300 border border-purple-500/30' : ($inquiry->status === 'in_discussion' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/30' : 'bg-gray-800 text-gray-300') }}">
                                    {{ ucfirst(str_replace('_', ' ', $inquiry->status)) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-xs text-gray-500">{{ $inquiry->created_at->format('M d, Y') }}</td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-xs px-3 py-1.5 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500/20 font-medium">Review</a>
                                <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="inline" onsubmit="return confirm('Delete this inquiry record?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-gray-500 text-sm">No client inquiries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $inquiries->links() }}
        </div>
    </div>
</div>
@endsection
