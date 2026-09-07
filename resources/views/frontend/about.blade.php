@extends('layouts.app')

@section('title', 'About Adventure Soft — Leadership & Mission')

@section('content')

<!-- Header Banner (WHITE THEME) -->
<section class="py-20 bg-slate-50 border-b border-slate-200 relative">
    <div class="max-w-7xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 px-3 py-1 rounded-full bg-emerald-100 border border-emerald-200">About Adventure Soft</span>
        <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 tracking-tight">Engineering World-Class Software</h1>
        <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto font-normal leading-relaxed">Founded with a vision to build robust, high-performance IT applications for global enterprises.</p>
    </div>
</section>

<!-- Company Mission & Vision -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-700">Our Vision & Mission</span>
                <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 leading-snug tracking-tight">Empowering Global Industry Leaders Through Technology</h2>
                <p class="text-slate-600 text-sm leading-relaxed">
                    At Adventure Soft, we believe software engineering should be precise, scalable, and beautifully designed. Our team of senior software architects, UI/UX designers, and DevOps engineers work together to deliver software solutions that transform business operations.
                </p>
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-slate-200">
                    <div>
                        <span class="block font-outfit font-extrabold text-2xl sm:text-3xl text-emerald-600">100%</span>
                        <span class="text-xs text-slate-500">Client Code Ownership</span>
                    </div>
                    <div>
                        <span class="block font-outfit font-extrabold text-2xl sm:text-3xl text-cyan-600">24/7</span>
                        <span class="text-xs text-slate-500">Global Engineering Support</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl space-y-6 border border-slate-200 shadow-xl shadow-slate-200/40">
                <h3 class="font-outfit font-bold text-lg sm:text-xl text-slate-900">Core Engineering Principles</h3>
                <ul class="space-y-4 text-xs text-slate-700">
                    <li class="flex items-start space-x-3">
                        <span class="p-1 rounded bg-emerald-100 text-emerald-700 font-bold shrink-0">✓</span>
                        <span><strong>Zero-Downtime Resilience:</strong> Microservices designed with fallback mechanisms and auto-scaling.</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <span class="p-1 rounded bg-emerald-100 text-emerald-700 font-bold shrink-0">✓</span>
                        <span><strong>Sub-second Performance:</strong> Optimized database queries, caching layers, and fast page loads.</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <span class="p-1 rounded bg-emerald-100 text-emerald-700 font-bold shrink-0">✓</span>
                        <span><strong>Aesthetic UI Excellence:</strong> World-class responsive designs with smooth micro-interactions.</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Leadership & Team Showcase -->
        <div class="space-y-12 pt-12 border-t border-slate-200">
            <div class="text-center max-w-2xl mx-auto space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-cyan-700">Leadership Team</span>
                <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight leading-snug">Meet Our Engineering Leaders</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($teams as $team)
                    <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-lg shadow-slate-200/40 hover:border-emerald-400 transition-all duration-300 hover:-translate-y-2 group flex flex-col justify-between p-6 text-center">
                        
                        <!-- Passport Size Profile Photo Container (3:4 ratio) -->
                        <div class="relative w-44 h-56 mx-auto rounded-2xl overflow-hidden border-2 border-emerald-500/30 shadow-xl bg-slate-100 group-hover:border-emerald-500 transition-all duration-300 shrink-0">
                            @if(!empty($team->photo) && (str_starts_with($team->photo, 'http') || str_starts_with($team->photo, '/storage') || file_exists(public_path($team->photo))))
                                <img src="{{ $team->photo }}" alt="{{ $team->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-tr from-emerald-600 via-teal-700 to-cyan-700 flex flex-col items-center justify-center space-y-2">
                                    <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center font-outfit font-extrabold text-2xl text-white">
                                        {{ substr($team->name, 0, 1) }}
                                    </div>
                                    <span class="text-[10px] text-emerald-100 font-mono">Passport Photo</span>
                                </div>
                            @endif
                        </div>

                        <!-- Leader Details -->
                        <div class="mt-6 space-y-3 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <h3 class="font-outfit font-extrabold text-xl text-slate-900 group-hover:text-emerald-700 transition-colors leading-tight">
                                    {{ $team->name }}
                                </h3>

                                <div class="flex flex-wrap items-center justify-center gap-2">
                                    <span class="px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-800 text-[11px] font-bold uppercase tracking-wider">
                                        {{ $team->designation }}
                                    </span>
                                </div>

                                @if(!empty($team->department))
                                    <div>
                                        <span class="inline-block px-2.5 py-0.5 rounded-md bg-cyan-50 border border-cyan-200 text-[10px] font-mono text-cyan-800 uppercase tracking-wider">
                                            {{ $team->department }}
                                        </span>
                                    </div>
                                @endif

                                <p class="text-slate-600 text-xs leading-relaxed pt-2 px-2">
                                    {{ $team->bio }}
                                </p>
                            </div>

                            <!-- Social Links Footer -->
                            @if(!empty($team->social_links))
                                <div class="pt-4 border-t border-slate-100 flex items-center justify-center space-x-3">
                                    @if(!empty($team->social_links['linkedin']))
                                        <a href="{{ $team->social_links['linkedin'] }}" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 border border-slate-200 hover:border-emerald-400 text-slate-600 hover:text-emerald-700 flex items-center justify-center transition-all text-xs" title="LinkedIn">
                                            in
                                        </a>
                                    @endif
                                    @if(!empty($team->social_links['github']))
                                        <a href="{{ $team->social_links['github'] }}" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 border border-slate-200 hover:border-emerald-400 text-slate-600 hover:text-emerald-700 flex items-center justify-center transition-all text-xs" title="GitHub">
                                            git
                                        </a>
                                    @endif
                                    @if(!empty($team->social_links['twitter']))
                                        <a href="{{ $team->social_links['twitter'] }}" target="_blank" class="w-8 h-8 rounded-full bg-slate-100 border border-slate-200 hover:border-emerald-400 text-slate-600 hover:text-emerald-700 flex items-center justify-center transition-all text-xs" title="Twitter / X">
                                            x
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
