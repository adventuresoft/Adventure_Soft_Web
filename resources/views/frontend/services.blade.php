@extends('layouts.app')

@section('title', 'Services & Engineering Capabilities — Adventure Soft')

@section('content')

<!-- Header Banner (WHITE THEME) -->
<section class="py-20 bg-slate-50 border-b border-slate-200 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 px-3 py-1 rounded-full bg-emerald-100 border border-emerald-200">Capabilities Overview</span>
        <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 tracking-tight">Software Engineering Services</h1>
        <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto font-normal leading-relaxed">Discover our full-stack engineering expertise designed to scale global enterprises.</p>
    </div>
</section>

<!-- Detailed Services Breakdown -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        @foreach($services as $index => $service)
            <div id="{{ $service->slug }}" class="bg-white p-8 sm:p-12 rounded-3xl grid grid-cols-1 lg:grid-cols-3 gap-8 items-center border border-slate-200 shadow-xl shadow-slate-200/40 hover:border-emerald-400 transition-all">
                <div class="lg:col-span-2 space-y-6">
                    <div class="inline-flex items-center space-x-2 text-xs font-mono text-emerald-700 font-bold">
                        <span>SERVICE #0{{ $index + 1 }}</span>
                    </div>
                    <h2 class="font-outfit font-bold text-xl sm:text-2xl text-slate-900">{{ $service->title }}</h2>
                    <p class="text-slate-600 text-sm leading-relaxed">{{ $service->long_description }}</p>

                    @if(!empty($service->features))
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-4">
                            @foreach($service->features as $feature)
                                <div class="flex items-center space-x-2 text-xs text-slate-700">
                                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 text-center space-y-4">
                    <span class="block text-xs uppercase font-semibold text-slate-500">Need this service?</span>
                    <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}" class="w-full block py-3 rounded-xl bg-gradient-to-r from-emerald-600 to-cyan-600 text-white font-bold text-xs shadow-md shadow-emerald-500/20 hover:scale-105 transition-all">
                        Request Discovery Call
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Development Methodology Timeline -->
<section class="py-24 bg-slate-50 border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-cyan-700">Development Process</span>
            <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight leading-snug">How We Work with Clients</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-2xl space-y-4 border-l-4 border-emerald-500 shadow-md border-t border-r border-b border-slate-200">
                <span class="text-2xl font-black font-outfit text-emerald-600">01</span>
                <h3 class="font-outfit font-bold text-lg text-slate-900">Discovery & Scope</h3>
                <p class="text-slate-600 text-xs">Technical requirement gathering, wireframing, and architecture mapping.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl space-y-4 border-l-4 border-cyan-500 shadow-md border-t border-r border-b border-slate-200">
                <span class="text-2xl font-black font-outfit text-cyan-600">02</span>
                <h3 class="font-outfit font-bold text-lg text-slate-900">Architecture & Code</h3>
                <p class="text-slate-600 text-xs">Sprint development, microservices, and continuous integration.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl space-y-4 border-l-4 border-purple-500 shadow-md border-t border-r border-b border-slate-200">
                <span class="text-2xl font-black font-outfit text-purple-600">03</span>
                <h3 class="font-outfit font-bold text-lg text-slate-900">QA & Security Audit</h3>
                <p class="text-slate-600 text-xs">Automated E2E testing, penetration testing, and load stress audits.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl space-y-4 border-l-4 border-amber-500 shadow-md border-t border-r border-b border-slate-200">
                <span class="text-2xl font-black font-outfit text-amber-600">04</span>
                <h3 class="font-outfit font-bold text-lg text-slate-900">Deploy & Scale</h3>
                <p class="text-slate-600 text-xs">Zero-downtime deployment to cloud infrastructure with 24/7 DevOps.</p>
            </div>
        </div>
    </div>
</section>

@endsection
