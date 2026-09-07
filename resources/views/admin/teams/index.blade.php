@extends('admin.layouts.admin')

@section('title', 'Manage Leadership & Team Members')
@section('page-title', 'Engineering Leaders & Team Management')

@section('content')
<div class="space-y-6" x-data="{ activeDept: 'all' }">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <p class="text-sm text-gray-400">Manage CEO & Founder, Executive, Digital Marketing, and Software Engineering team members.</p>
        </div>
        <a href="{{ route('admin.teams.create') }}" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-600 text-white font-semibold text-xs shadow-lg shadow-emerald-500/20 hover:scale-105 transition-all self-start sm:self-auto flex items-center space-x-2">
            <span>+ Add Team Member / Leader</span>
        </a>
    </div>

    <!-- Department Filter Tabs -->
    <div class="flex flex-wrap gap-2 pt-1">
        <button @click="activeDept = 'all'" :class="activeDept === 'all' ? 'bg-emerald-500 text-white font-bold' : 'bg-gray-800/80 text-gray-400 hover:text-white'" class="px-3.5 py-1.5 rounded-xl text-xs transition-all">All Roles ({{ $members->count() }})</button>
        <button @click="activeDept = 'CEO & Founder'" :class="activeDept === 'CEO & Founder' ? 'bg-amber-500 text-slate-950 font-bold' : 'bg-gray-800/80 text-gray-400 hover:text-white'" class="px-3.5 py-1.5 rounded-xl text-xs transition-all">👑 CEO & Founder</button>
        <button @click="activeDept = 'Executive Leadership'" :class="activeDept === 'Executive Leadership' ? 'bg-cyan-500 text-slate-950 font-bold' : 'bg-gray-800/80 text-gray-400 hover:text-white'" class="px-3.5 py-1.5 rounded-xl text-xs transition-all">👔 Executive</button>
        <button @click="activeDept = 'Digital Marketing'" :class="activeDept === 'Digital Marketing' ? 'bg-purple-500 text-white font-bold' : 'bg-gray-800/80 text-gray-400 hover:text-white'" class="px-3.5 py-1.5 rounded-xl text-xs transition-all">📈 Digital Marketing</button>
        <button @click="activeDept = 'Software Engineering'" :class="activeDept === 'Software Engineering' ? 'bg-emerald-500 text-white font-bold' : 'bg-gray-800/80 text-gray-400 hover:text-white'" class="px-3.5 py-1.5 rounded-xl text-xs transition-all">💻 Software Engineering</button>
    </div>

    <div class="glass-panel rounded-2xl p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-800 text-xs uppercase text-gray-400">
                        <th class="py-3 px-4">Member / Leader</th>
                        <th class="py-3 px-4">Role / Designation</th>
                        <th class="py-3 px-4">Department / Category</th>
                        <th class="py-3 px-4">Order</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/50">
                    @forelse($members as $member)
                        <tr x-show="activeDept === 'all' || '{{ $member->department }}'.toLowerCase().includes(activeDept.toLowerCase())" class="hover:bg-gray-800/30 transition-colors">
                            <td class="py-3.5 px-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-11 h-11 rounded-2xl bg-gray-800 border border-gray-700 overflow-hidden shrink-0">
                                        <img src="{{ $member->photo }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <span class="font-semibold text-white block text-sm">{{ $member->name }}</span>
                                        <span class="text-xs text-gray-400 truncate max-w-xs block">{{ Str::limit($member->bio, 45) }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-xs font-semibold text-emerald-400">{{ $member->designation }}</td>
                            <td class="py-3.5 px-4 text-xs">
                                @if(str_contains(strtolower($member->department), 'ceo') || str_contains(strtolower($member->department), 'founder'))
                                    <span class="px-2.5 py-1 rounded-lg bg-amber-500/10 border border-amber-500/30 text-amber-300 font-semibold font-mono">👑 {{ $member->department }}</span>
                                @elseif(str_contains(strtolower($member->department), 'marketing'))
                                    <span class="px-2.5 py-1 rounded-lg bg-purple-500/10 border border-purple-500/30 text-purple-300 font-semibold font-mono">📈 {{ $member->department }}</span>
                                @elseif(str_contains(strtolower($member->department), 'executive'))
                                    <span class="px-2.5 py-1 rounded-lg bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 font-semibold font-mono">👔 {{ $member->department }}</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-lg bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 font-semibold font-mono">💻 {{ $member->department }}</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-xs font-mono text-gray-400">#{{ $member->display_order }}</td>
                            <td class="py-3.5 px-4">
                                @if($member->status)
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-500/15 text-emerald-400 border border-emerald-500/30">Active</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-red-500/15 text-red-400 border border-red-500/30">Inactive</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.teams.edit', $member->id) }}" class="text-xs px-3 py-1.5 rounded-lg bg-gray-800 text-gray-300 hover:text-white hover:bg-gray-700 transition-all">Edit</a>
                                <form action="{{ route('admin.teams.destroy', $member->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this team member?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition-all">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-gray-500 text-sm">No team members found. Click "+ Add Team Member / Leader" to add one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
