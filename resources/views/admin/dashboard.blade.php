@extends('admin.layouts.admin')

@section('title', 'Executive Dashboard')
@section('page-title', 'System Overview & Lead Metrics')

@section('content')
<div class="space-y-8">
    <!-- Stat KPI Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat 1: Total Services -->
        <div class="glass-panel p-6 rounded-2xl flex items-center justify-between border-l-4 border-emerald-500">
            <div>
                <span class="text-xs uppercase font-semibold text-gray-400 tracking-wider">Active Services</span>
                <h3 class="text-3xl font-extrabold font-outfit text-white mt-2">{{ $stats['total_services'] }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
            </div>
        </div>

        <!-- Stat 2: Case Studies -->
        <div class="glass-panel p-6 rounded-2xl flex items-center justify-between border-l-4 border-cyan-500">
            <div>
                <span class="text-xs uppercase font-semibold text-gray-400 tracking-wider">Case Studies</span>
                <h3 class="text-3xl font-extrabold font-outfit text-white mt-2">{{ $stats['total_portfolios'] }}</h3>
            </div>
            <div class="w-12 h-12 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
        </div>

        <!-- Stat 3: Total Inquiries -->
        <div class="glass-panel p-6 rounded-2xl flex items-center justify-between border-l-4 border-purple-500">
            <div>
                <span class="text-xs uppercase font-semibold text-gray-400 tracking-wider">Client Inquiries</span>
                <div class="flex items-baseline space-x-2">
                    <h3 class="text-3xl font-extrabold font-outfit text-white mt-2">{{ $stats['total_inquiries'] }}</h3>
                    @if($stats['new_inquiries'] > 0)
                        <span class="text-xs px-2 py-0.5 rounded-full bg-purple-500/20 text-purple-300 font-semibold">{{ $stats['new_inquiries'] }} New</span>
                    @endif
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-500/10 text-purple-400 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
        </div>

        <!-- Stat 4: Job Applications & Openings -->
        <a href="{{ route('admin.jobs.index') }}" class="glass-panel p-6 rounded-2xl flex items-center justify-between border-l-4 border-amber-500 hover:border-amber-400 hover:scale-[1.02] transition-all group block">
            <div>
                <span class="text-xs uppercase font-semibold text-gray-400 group-hover:text-amber-300 tracking-wider transition-colors">Job Applicants & Roles</span>
                <div class="flex items-baseline space-x-2">
                    <h3 class="text-3xl font-extrabold font-outfit text-white mt-2">{{ $stats['total_applications'] }}</h3>
                    @if($stats['pending_applications'] > 0)
                        <span class="text-xs px-2 py-0.5 rounded-full bg-amber-500/20 text-amber-300 font-semibold">{{ $stats['pending_applications'] }} Pending</span>
                    @endif
                </div>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-400 group-hover:bg-amber-500/20 flex items-center justify-center transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
        </a>
    </div>

    <!-- Recent Inquiries Section -->
    <div class="glass-panel rounded-2xl p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-outfit font-bold text-lg text-white">Recent Client Inquiries & Leads</h2>
            <a href="{{ route('admin.inquiries.index') }}" class="text-xs text-emerald-400 hover:text-emerald-300 font-semibold">View All Inquiries &rarr;</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-800 text-xs uppercase text-gray-400">
                        <th class="py-3 px-4">Client Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Requested Service</th>
                        <th class="py-3 px-4">Est. Budget</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Date</th>
                        <th class="py-3 px-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @forelse($recentInquiries as $inquiry)
                        <tr class="hover:bg-gray-800/30 transition-colors">
                            <td class="py-3 px-4 font-semibold text-white">{{ $inquiry->name }}</td>
                            <td class="py-3 px-4 text-gray-300">{{ $inquiry->email }}</td>
                            <td class="py-3 px-4 text-emerald-400 font-medium">{{ $inquiry->service_requested ?? 'General' }}</td>
                            <td class="py-3 px-4 text-gray-300">{{ $inquiry->estimated_budget ?? 'N/A' }}</td>
                            <td class="py-3 px-4">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $inquiry->status === 'new' ? 'bg-purple-500/20 text-purple-300 border border-purple-500/30' : 'bg-gray-800 text-gray-300' }}">
                                    {{ ucfirst(str_replace('_', ' ', $inquiry->status)) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-xs text-gray-500">{{ $inquiry->created_at->diffForHumans() }}</td>
                            <td class="py-3 px-4 text-right">
                                <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="text-xs px-3 py-1.5 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500/20 border border-emerald-500/30 font-medium transition-all">Review</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-gray-500 text-sm">No client inquiries received yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
