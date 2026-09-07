@extends('layouts.app')

@section('title', $project->title . ' — Adventure Soft')

@section('content')

<!-- Hero Section (WHITE THEME) -->
<section class="py-24 bg-slate-50 border-b border-slate-200 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-6">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center space-x-2 text-xs text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-emerald-700 transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('projects') }}" class="hover:text-emerald-700 transition-colors">Projects</a>
            <span>/</span>
            <span class="text-slate-900 font-semibold">{{ $project->title }}</span>
        </nav>

        <div class="flex flex-wrap items-center gap-3">
            <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200 text-xs font-bold uppercase tracking-wider">
                {{ $project->category }}
            </span>
            <span class="text-xs text-slate-500 font-mono">Client: {{ $project->client_name }}</span>
        </div>

        <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 max-w-4xl tracking-tight leading-tight">
            {{ $project->title }}
        </h1>

        @if(!empty($project->project_url))
            <div>
                <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center space-x-2 px-6 py-3 rounded-full bg-gradient-to-r from-emerald-600 to-cyan-600 text-white font-bold text-xs shadow-lg shadow-emerald-500/20 hover:scale-105 transition-all">
                    <span>Visit Live System ({{ parse_url($project->project_url, PHP_URL_HOST) }})</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        @endif

    </div>
</section>

<!-- Content Body -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-2 space-y-12">
                <!-- Challenge Section -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-md space-y-4">
                    <h2 class="font-outfit font-bold text-2xl text-slate-900 flex items-center space-x-3">
                        <span class="w-3 h-3 rounded-full bg-amber-500"></span>
                        <span>The Technical Challenge</span>
                    </h2>
                    <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $project->challenge }}</p>
                </div>

                <!-- Solution Section -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-md space-y-4">
                    <h2 class="font-outfit font-bold text-2xl text-slate-900 flex items-center space-x-3">
                        <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                        <span>Our Software Engineering Solution</span>
                    </h2>
                    <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $project->solution }}</p>
                </div>
            </div>

            <!-- Sidebar Info -->
            <div class="space-y-8">
                <!-- Impact Metrics -->
                @if(!empty($project->impact_metrics))
                    <div class="bg-slate-50 p-6 rounded-3xl border border-slate-200 space-y-4 shadow-sm">
                        <h3 class="font-outfit font-bold text-lg text-slate-900 border-b border-slate-200 pb-3">Project Impact & Results</h3>
                        <div class="space-y-4">
                            @foreach((array)$project->impact_metrics as $label => $val)
                                <div class="p-3 rounded-xl bg-white border border-slate-200 shadow-xs">
                                    <span class="block font-outfit font-bold text-lg text-emerald-600">{{ $val }}</span>
                                    <span class="block text-xs text-slate-500 uppercase tracking-wider mt-0.5">{{ $label }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Technologies Used -->
                @if(!empty($project->tech_stack))
                    <div class="bg-slate-50 p-6 rounded-3xl border border-slate-200 space-y-4 shadow-sm">
                        <h3 class="font-outfit font-bold text-lg text-slate-900 border-b border-slate-200 pb-3">Tech Stack Used</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach((array)$project->tech_stack as $t)
                                <span class="px-3 py-1.5 rounded-xl bg-white border border-slate-200 text-xs font-semibold text-slate-700 shadow-xs">
                                    {{ $t }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Direct CTA -->
                <div class="p-6 rounded-3xl bg-slate-900 text-white border border-slate-800 text-center space-y-4 shadow-xl">
                    <h4 class="font-outfit font-bold text-white text-base">Want a Solution Like This?</h4>
                    <p class="text-slate-300 text-xs">Let our architects engineer a custom high-performance system for your business.</p>
                    <a href="{{ route('contact') }}" class="block w-full py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-500 text-white font-bold text-xs shadow-lg shadow-emerald-500/20">
                        Schedule Discovery Call
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
