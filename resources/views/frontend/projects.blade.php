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
<section x-data="{ selectedCategory: 'all' }" class="py-24 bg-white relative overflow-hidden">
    <!-- Ambient Background Light Effects -->
    <div class="absolute top-1/4 -left-40 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-40 w-96 h-96 bg-teal-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Category Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-2.5 sm:gap-3">
            <button @click="selectedCategory = 'all'" 
                    :class="selectedCategory === 'all' 
                        ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold shadow-md shadow-emerald-500/25 ring-2 ring-emerald-500/30' 
                        : 'bg-white text-slate-700 hover:bg-slate-50 hover:text-emerald-700 border border-slate-200/90 shadow-2xs'"
                    class="px-5 py-2.5 rounded-full text-xs font-medium transition-all duration-300 transform hover:scale-105 active:scale-95">
                All Projects ({{ $projects->count() }})
            </button>
            @foreach($categories as $cat)
                <button @click="selectedCategory = '{{ $cat }}'" 
                        :class="selectedCategory === '{{ $cat }}' 
                            ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold shadow-md shadow-emerald-500/25 ring-2 ring-emerald-500/30' 
                            : 'bg-white text-slate-700 hover:bg-slate-50 hover:text-emerald-700 border border-slate-200/90 shadow-2xs'"
                        class="px-5 py-2.5 rounded-full text-xs font-medium transition-all duration-300 transform hover:scale-105 active:scale-95">
                    {{ $cat }}
                </button>
            @endforeach
        </div>

        @php
            $catMeta = [
                'GovTech & E-Governance' => ['class' => 'bg-emerald-50 text-emerald-800 border-emerald-200/80', 'icon' => '🏛️'],
                'FinTech & Web App' => ['class' => 'bg-cyan-50 text-cyan-800 border-cyan-200/80', 'icon' => '💳'],
                'Social Impact & Non-Profit Tech' => ['class' => 'bg-teal-50 text-teal-800 border-teal-200/80', 'icon' => '🤝'],
                'Healthcare & AI' => ['class' => 'bg-purple-50 text-purple-800 border-purple-200/80', 'icon' => '🧬'],
                'Enterprise SaaS' => ['class' => 'bg-amber-50 text-amber-800 border-amber-200/80', 'icon' => '⚡'],
            ];
        @endphp

        <!-- Projects Card Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $pIdx => $project)
                @php
                    $meta = $catMeta[$project->category] ?? ['class' => 'bg-slate-50 text-slate-700 border-slate-200', 'icon' => '🚀'];
                @endphp
                <div x-show="selectedCategory === 'all' || selectedCategory === '{{ $project->category }}'"
                     x-transition:enter="transition ease-out duration-400"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-3"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     class="project-card group"
                     style="--card-idx: {{ $pIdx }};">
                    
                    <!-- Top Animated Gradient Accent Bar on Hover -->
                    <div class="project-accent-bar"></div>

                    <!-- Ambient Light Shimmer Sweep Across Card -->
                    <div class="project-shimmer-sweep"></div>

                    <!-- Ambient Soft Radial Glow Aura -->
                    <div class="project-ambient-aura"></div>

                    <!-- Subtle Background Tech Mesh Pattern -->
                    <div class="project-mesh-bg"></div>

                    <div class="p-7 sm:p-8 space-y-6 relative z-10 flex-1 flex flex-col justify-between">
                        <div class="space-y-5">
                            <!-- Top Header: Category Pill & Live Link -->
                            <div class="flex items-center justify-between gap-2">
                                <span class="inline-flex items-center space-x-1.5 text-[11px] px-3 py-1 rounded-full font-bold uppercase tracking-wider border shadow-2xs {{ $meta['class'] }} transition-transform duration-300 group-hover:scale-105">
                                    <span>{{ $meta['icon'] }}</span>
                                    <span>{{ $project->category }}</span>
                                </span>
                                @if(!empty($project->project_url))
                                    <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" 
                                       class="text-xs font-bold text-emerald-700 hover:text-emerald-800 flex items-center space-x-1 group/live transition-colors py-0.5 px-2 rounded-lg hover:bg-emerald-50">
                                        <span>Live URL</span>
                                        <svg class="w-3.5 h-3.5 transform group-hover/live:translate-x-0.5 group-hover/live:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>

                            <!-- Client Label & Project Title -->
                            <div class="space-y-1.5">
                                <div class="flex items-center space-x-1.5 text-xs text-slate-500 font-mono">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    <span class="line-clamp-1 uppercase tracking-tight">CLIENT: {{ $project->client_name }}</span>
                                </div>
                                <h3 class="font-outfit font-extrabold text-xl sm:text-[21px] text-slate-900 group-hover:text-emerald-700 transition-colors leading-snug">
                                    <a href="{{ route('projects.show', $project->slug) }}" class="block">
                                        {{ $project->title }}
                                    </a>
                                </h3>
                            </div>

                            <!-- Challenge Description -->
                            <p class="text-slate-600 text-xs sm:text-[13px] leading-relaxed line-clamp-3">
                                {{ $project->challenge }}
                            </p>

                            <!-- Tech Stack Tags -->
                            @if(!empty($project->tech_stack))
                                <div class="flex flex-wrap gap-1.5 pt-1">
                                    @foreach((array)$project->tech_stack as $tech)
                                        <span class="tech-tag px-2.5 py-1 rounded-lg bg-slate-50 border border-slate-200/80 text-[10.5px] font-semibold text-slate-700 shadow-2xs">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Impact Metrics Box (Luxury Dashboard Widget Design) -->
                        @if(!empty($project->impact_metrics))
                            <div class="metrics-box p-4 rounded-2xl grid grid-cols-2 gap-3 mt-4">
                                @foreach((array)$project->impact_metrics as $label => $val)
                                    <div class="space-y-0.5">
                                        <span class="block font-outfit font-extrabold text-sm sm:text-base text-emerald-600 tracking-tight">
                                            {{ $val }}
                                        </span>
                                        <span class="block text-[9.5px] font-bold text-slate-500 uppercase tracking-wider line-clamp-1">
                                            {{ $label }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Footer Action Buttons -->
                    <div class="px-7 sm:px-8 pb-7 sm:pb-8 pt-0 flex items-center space-x-3 relative z-10">
                        <a href="{{ route('projects.show', $project->slug) }}" 
                           class="flex-1 text-center py-3 px-4 rounded-xl bg-slate-900 hover:bg-emerald-600 text-white text-xs font-bold transition-all duration-300 shadow-sm hover:shadow-md hover:shadow-emerald-600/25 flex items-center justify-center space-x-1.5 group/btn">
                            <span>Project Details</span>
                            <span class="inline-block transform transition-transform duration-300 group-hover/btn:translate-x-1.5 text-sm">&rarr;</span>
                        </a>
                        @if(!empty($project->project_url))
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer" 
                               class="py-3 px-4 rounded-xl bg-emerald-50 hover:bg-emerald-500 text-emerald-700 hover:text-white border border-emerald-200/90 text-xs font-bold transition-all duration-300 flex items-center space-x-1 shrink-0 group/visit shadow-2xs hover:shadow-md hover:shadow-emerald-500/20"
                               title="Visit Live Application">
                                <span>Visit</span>
                                <span class="inline-block transform transition-transform duration-300 group-hover/visit:translate-x-0.5 group-hover/visit:-translate-y-0.5 text-xs font-bold">↗</span>
                            </a>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection

@push('styles')
<style>
    /* =========================================================
       Professional Aesthetic Project Card Design & Animations
       ========================================================= */

    .project-card {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 4px 20px -4px rgba(15, 23, 42, 0.06), 0 1px 3px rgba(0, 0, 0, 0.03);
        transition: transform .4s cubic-bezier(0.34, 1.56, 0.64, 1),
                    box-shadow .4s cubic-bezier(0.34, 1.56, 0.64, 1),
                    border-color .4s ease;
        will-change: transform, box-shadow;
    }

    .project-card:hover {
        transform: translateY(-8px);
        border-color: rgba(16, 185, 129, 0.55);
        box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.22),
                    0 10px 20px -6px rgba(0, 0, 0, 0.05),
                    0 0 0 1px rgba(16, 185, 129, 0.2);
    }

    /* Top Shimmer Accent Line */
    .project-accent-bar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent 0%, #10b981 30%, #34d399 70%, transparent 100%);
        opacity: 0;
        transform: scaleX(0.3);
        transition: opacity .4s ease, transform .4s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 20;
    }

    .project-card:hover .project-accent-bar {
        opacity: 1;
        transform: scaleX(1);
    }

    /* Diagonal Light Shimmer Across Card Face */
    .project-shimmer-sweep {
        position: absolute;
        top: 0;
        left: -130%;
        width: 65%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.65), transparent);
        transform: skewX(-25deg);
        transition: left .8s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        z-index: 15;
    }

    .project-card:hover .project-shimmer-sweep {
        left: 190%;
    }

    /* Ambient Soft Radial Glow Aura */
    .project-ambient-aura {
        position: absolute;
        top: -30px;
        right: -30px;
        width: 170px;
        height: 170px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.18) 0%, rgba(20, 184, 166, 0.06) 50%, transparent 75%);
        border-radius: 9999px;
        filter: blur(18px);
        opacity: 0;
        transition: opacity .5s ease, transform .5s ease;
        pointer-events: none;
        z-index: 2;
    }

    .project-card:hover .project-ambient-aura {
        opacity: 1;
        transform: scale(1.35);
    }

    /* Subtle Modern Tech Mesh Background Pattern */
    .project-mesh-bg {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(16, 185, 129, 0.08) 1px, transparent 1px);
        background-size: 18px 18px;
        opacity: 0;
        transition: opacity .5s ease;
        pointer-events: none;
        z-index: 1;
    }

    .project-card:hover .project-mesh-bg {
        opacity: 0.7;
    }

    /* Tech Stack Tag Hover Bounce */
    .tech-tag {
        transition: transform .2s ease, background-color .2s ease, border-color .2s ease, color .2s ease;
    }

    .tech-tag:hover {
        transform: translateY(-2px) scale(1.05);
        background-color: #ecfdf5 !important;
        border-color: #a7f3d0 !important;
        color: #047857 !important;
    }

    /* Dashboard Metrics Box */
    .metrics-box {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, rgba(248, 250, 252, 0.85) 0%, rgba(240, 253, 250, 0.5) 100%);
        border: 1px solid rgba(226, 232, 240, 0.85);
        transition: border-color .3s ease, background .3s ease;
    }

    .project-card:hover .metrics-box {
        border-color: rgba(16, 185, 129, 0.35);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(236, 253, 245, 0.75) 100%);
    }
</style>
@endpush
