@extends('layouts.app')

@section('title', 'Enterprise Projects & Portfolio Case Studies — Adventure Soft')

@section('content')

<!-- Header Banner (WHITE THEME) -->
<section class="py-20 bg-slate-50 border-b border-slate-200 relative overflow-hidden">
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-emerald-200/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 text-center space-y-4 relative z-10">
        <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 px-3 py-1 rounded-full bg-emerald-100 border border-emerald-200">Selected Works & Case Studies</span>
        <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 tracking-tight">Featured Enterprise Projects</h1>
        <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto font-normal leading-relaxed">Explore our high-impact enterprise software deployments across FinTech, Legal Tech, HealthCare, and Govt Platforms.</p>
    </div>
</section>

<!-- Projects Grid with Category Filters -->
<section x-data="{ selectedCategory: 'all' }" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Category Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-3">
            <button @click="selectedCategory = 'all'" 
                    :class="selectedCategory === 'all' ? 'bg-gradient-to-r from-emerald-600 to-cyan-600 text-white font-bold shadow-lg shadow-emerald-500/20' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200'"
                    class="px-5 py-2.5 rounded-full text-xs font-medium transition-all">
                All Projects ({{ $projects->count() }})
            </button>
            @foreach($categories as $cat)
                <button @click="selectedCategory = '{{ $cat }}'" 
                        :class="selectedCategory === '{{ $cat }}' ? 'bg-gradient-to-r from-emerald-600 to-cyan-600 text-white font-bold shadow-lg shadow-emerald-500/20' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200'"
                        class="px-5 py-2.5 rounded-full text-xs font-medium transition-all">
                    {{ $cat }}
                </button>
            @endforeach
        </div>

        <!-- Projects Card Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <div x-show="selectedCategory === 'all' || selectedCategory === '{{ $project->category }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-lg shadow-slate-200/50 hover:border-emerald-400 transition-all duration-300 hover:-translate-y-2 group flex flex-col justify-between">
                    
                    <div class="p-8 space-y-6">
                        <!-- Top Header Badges -->
                        <div class="flex items-center justify-between">
                            <span class="text-[11px] px-3 py-1 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-200 font-bold uppercase tracking-wider">
                                {{ $project->category }}
                            </span>
                            @if(!empty($project->project_url))
                                <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="text-xs text-cyan-700 hover:text-cyan-900 font-semibold flex items-center space-x-1">
                                    <span>Live URL</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                            @endif
                        </div>

                        <!-- Project Title & Client -->
                        <div>
                            <span class="text-xs text-slate-500 font-mono block mb-1">CLIENT: {{ $project->client_name }}</span>
                            <h3 class="font-outfit font-extrabold text-xl text-slate-900 group-hover:text-emerald-700 transition-colors leading-snug">
                                <a href="{{ route('projects.show', $project->slug) }}">{{ $project->title }}</a>
                            </h3>
                        </div>

                        <!-- Description & Challenge -->
                        <p class="text-slate-600 text-xs leading-relaxed line-clamp-3">
                            {{ $project->challenge }}
                        </p>

                        <!-- Tech Stack Tags -->
                        @if(!empty($project->tech_stack))
                            <div class="flex flex-wrap gap-1.5 pt-2">
                                @foreach((array)$project->tech_stack as $tech)
                                    <span class="px-2.5 py-1 rounded-lg bg-slate-100 border border-slate-200 text-[10px] font-semibold text-slate-700">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Impact Metrics Box -->
                        @if(!empty($project->impact_metrics))
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 grid grid-cols-2 gap-2">
                                @foreach((array)$project->impact_metrics as $label => $val)
                                    <div>
                                        <span class="block font-outfit font-bold text-sm text-emerald-600">{{ $val }}</span>
                                        <span class="block text-[9px] text-slate-500 uppercase tracking-wider mt-0.5">{{ $label }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Footer Action Buttons -->
                    <div class="px-8 pb-8 pt-2 flex items-center space-x-3">
                        <a href="{{ route('projects.show', $project->slug) }}" class="flex-1 text-center py-3 rounded-xl bg-slate-100 hover:bg-emerald-50 border border-slate-200 hover:border-emerald-200 text-xs font-semibold text-slate-800 hover:text-emerald-700 transition-all">
                            Project Details &rarr;
                        </a>
                        @if(!empty($project->project_url))
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="py-3 px-4 rounded-xl bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-700 text-xs font-bold transition-all shrink-0">
                                Visit ↗
                            </a>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
