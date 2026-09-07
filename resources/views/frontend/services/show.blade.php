@extends('layouts.app')

@section('title', $service->title . ' — Adventure Soft')
@section('meta_description', $service->short_description)

@section('content')

<!-- 1. HERO BANNER (WHITE THEME) -->
<section class="relative py-24 bg-slate-50 border-b border-slate-200 overflow-hidden">
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-emerald-200/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-cyan-200/40 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <nav class="flex items-center space-x-2 text-xs text-slate-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-emerald-700 transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('services') }}" class="hover:text-emerald-700 transition-colors">Services</a>
            <span>/</span>
            <span class="text-slate-900 font-semibold">{{ $service->title }}</span>
        </nav>

        <div class="max-w-4xl space-y-6">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-emerald-100 border border-emerald-200 text-emerald-800 text-xs font-bold uppercase tracking-widest">
                <span class="w-2 h-2 rounded-full bg-emerald-600 animate-ping"></span>
                <span>Enterprise Service Capability</span>
            </div>

            <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 tracking-tight leading-tight">
                {{ $service->title }}
            </h1>

            <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                {{ $service->long_description }}
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-4">
                <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}" class="px-8 py-4 rounded-full bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 text-white font-bold text-sm shadow-xl shadow-emerald-500/25 hover:scale-105 transition-all flex items-center space-x-2">
                    <span>Consult on {{ $service->title }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>

                <a href="#core-capabilities" class="px-6 py-4 rounded-full bg-white border border-slate-300 text-slate-700 hover:text-slate-900 hover:bg-slate-100 text-sm font-semibold transition-all shadow-sm">
                    Explore Capabilities ↓
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 2. MAIN CONTENT & SIDEBAR -->
<section id="core-capabilities" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Left 2 Columns: Core Features & Architecture -->
            <div class="lg:col-span-2 space-y-16">
                
                <!-- Key Deliverables & Features -->
                <div class="space-y-8">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-emerald-700">Core Architecture</span>
                        <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 mt-1">What We Deliver</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @if(!empty($service->features))
                            @foreach($service->features as $feature)
                                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-md shadow-slate-200/40 hover:border-emerald-400 transition-all group">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <h3 class="font-outfit font-bold text-lg text-slate-900 group-hover:text-emerald-700 transition-colors">{{ $feature }}</h3>
                                    <p class="text-slate-500 text-xs mt-2 leading-relaxed">Engineered using battle-tested enterprise design patterns and industry compliance frameworks.</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Engineering Methodology Workflow -->
                <div class="space-y-8">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-cyan-700">Engineering Process</span>
                        <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 mt-1">How We Execute</h2>
                    </div>

                    <div class="space-y-4">
                        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 font-outfit font-black text-lg flex items-center justify-center shrink-0">1</div>
                            <div>
                                <h4 class="font-outfit font-bold text-slate-900 text-base">Technical Discovery & Blueprinting</h4>
                                <p class="text-slate-600 text-xs mt-1">We analyze system dependencies, data models, compliance requirements, and non-functional goals (SLA, latency, TPS).</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-full bg-cyan-100 text-cyan-700 font-outfit font-black text-lg flex items-center justify-center shrink-0">2</div>
                            <div>
                                <h4 class="font-outfit font-bold text-slate-900 text-base">High-Performance Architecture</h4>
                                <p class="text-slate-600 text-xs mt-1">Designing microservices, API contracts, automated CI/CD pipelines, and secure cloud containerization.</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-700 font-outfit font-black text-lg flex items-center justify-center shrink-0">3</div>
                            <div>
                                <h4 class="font-outfit font-bold text-slate-900 text-base">Agile Sprint Delivery & E2E Testing</h4>
                                <p class="text-slate-600 text-xs mt-1">Bi-weekly demo releases with continuous automated unit, integration, and load testing.</p>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-700 font-outfit font-black text-lg flex items-center justify-center shrink-0">4</div>
                            <div>
                                <h4 class="font-outfit font-bold text-slate-900 text-base">Zero-Downtime Deployment & 24/7 Support</h4>
                                <p class="text-slate-600 text-xs mt-1">Production rollout with active telemetry, APM monitoring, and SLAs for enterprise uptime.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technologies Used in this Domain -->
                <div class="space-y-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-emerald-700">Tech Stack</span>
                        <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 mt-1">Technologies We Leverage</h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @foreach(['Laravel / PHP', 'React / Next.js', 'Python / AI', 'Docker & K8s', 'AWS & GCP', 'PostgreSQL / Redis'] as $techName)
                            <div class="bg-slate-50 p-4 rounded-xl text-center border border-slate-200">
                                <span class="font-outfit font-bold text-slate-800 text-xs block">{{ $techName }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <!-- Right Column: All Services Navigation & Quick Estimate CTA -->
            <div class="space-y-8">
                
                <!-- Services Menu Sidebar -->
                <div class="bg-slate-50 p-6 rounded-3xl border border-slate-200 space-y-4 shadow-md">
                    <h3 class="font-outfit font-bold text-lg text-slate-900 border-b border-slate-200 pb-3">All Capabilities</h3>
                    
                    <div class="space-y-2">
                        @foreach($allServices as $s)
                            <a href="{{ route('services.show', $s->slug) }}" 
                               class="flex items-center justify-between p-3 rounded-xl transition-all text-xs font-semibold {{ $s->slug === $service->slug ? 'bg-emerald-100 text-emerald-800 border border-emerald-300 font-bold' : 'text-slate-700 hover:bg-white hover:text-slate-900' }}">
                                <span class="line-clamp-1">{{ $s->title }}</span>
                                <svg class="w-4 h-4 shrink-0 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Consultation Card -->
                <div class="p-8 rounded-3xl bg-slate-900 text-white border border-slate-800 text-center space-y-6 shadow-2xl">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 text-emerald-400 mx-auto flex items-center justify-center border border-emerald-500/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>

                    <div>
                        <h4 class="font-outfit font-bold text-white text-lg">Need {{ $service->title }}?</h4>
                        <p class="text-slate-400 text-xs mt-2">Get an estimated cost breakdown and architecture review within 24 hours.</p>
                    </div>

                    <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}" class="block w-full py-3.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-500 text-white font-bold text-xs shadow-lg shadow-emerald-500/25 hover:scale-105 transition-transform">
                        Schedule Architecture Call
                    </a>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- 3. FINAL CTA BANNER -->
<section class="py-16 bg-slate-50 border-t border-slate-200">
    <div class="max-w-5xl mx-auto px-4 text-center space-y-6">
        <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900">
            Ready to Build Your Enterprise Solution?
        </h2>
        <p class="text-slate-600 text-sm max-w-xl mx-auto">
            Partner with Adventure Soft to build resilient, high-throughput software engineered for market dominance.
        </p>
        <div>
            <a href="{{ route('contact') }}" class="inline-flex items-center space-x-2 px-8 py-3.5 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs transition-colors shadow-md">
                <span>Start Project Conversation</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
