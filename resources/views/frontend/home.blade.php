@extends('layouts.app')

@section('title', 'Adventure Soft — Engineering Future-Proof Software for Global Enterprises')

@section('content')

<!-- 1. HERO SECTION (VIDEO THEME) -->
<section class="relative min-h-[90vh] flex items-center justify-center pt-28 sm:pt-32 pb-10 sm:pb-12 overflow-hidden bg-slate-950">
    
    <!-- Crisp Clear Video Background Backdrop -->
    <div class="absolute inset-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <video 
            id="hero-bg-video"
            autoplay 
            loop 
            muted 
            playsinline 
            preload="auto"
            class="w-full h-full object-cover opacity-90 scale-100">
            <source src="{{ asset('assets/videos/smart-city.mp4') }}" type="video/mp4">
            <source src="{{ asset('storage/videos/smart-city.mp4') }}" type="video/mp4">
            <source src="{{ asset('assets/videos/Smart City Digital City Video.mp4') }}" type="video/mp4">
        </video>
        
        <!-- Subtle Cinematic Dark Vignette for Pristine Contrast -->
        <div class="absolute inset-0 bg-slate-950/35"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/60 via-transparent to-slate-950/80"></div>
    </div>
    
    <!-- Interactive Particle Canvas Backdrop -->
    <canvas id="hero-particle-canvas" class="absolute inset-0 w-full h-full pointer-events-none z-0 opacity-30"></canvas>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center space-y-7">
        
        <!-- Top Badge -->
        <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-slate-900/80 border border-emerald-500/40 text-xs font-semibold text-emerald-300 shadow-lg shadow-black/40 backdrop-blur-md reveal-up">
            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
            <span>Software Development Company</span>
        </div>

        <!-- Main Headline (Refined Professional Size) -->
        <h1 class="font-outfit font-extrabold text-2xl sm:text-3xl lg:text-4xl tracking-tight text-white leading-snug max-w-3xl mx-auto drop-shadow-lg reveal-up">
            Smart Software. <span class="bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400 bg-clip-text text-transparent">Scalable Solutions.</span><br> Built for the Future. 
        </h1>

        <!-- Sub-headline -->
        <p class="text-slate-200 text-sm sm:text-base max-w-2xl mx-auto font-normal leading-relaxed drop-shadow reveal-up">
            Adventure Soft builds scalable, high-performance software solutions, cloud platforms, mobile applications, and enterprise AI systems designed to drive business growth and digital transformation.
        </p>

        <!-- Dual CTA Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3.5 pt-2 reveal-up">
            <a href="#estimator" class="w-full sm:w-auto px-7 py-3.5 rounded-full bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 text-white font-bold text-sm shadow-xl shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:scale-105 transition-all flex items-center justify-center space-x-2.5 group">
                <span>Estimate Your Project Cost</span>
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>

            <a href="{{ route('services') }}" class="w-full sm:w-auto px-7 py-3.5 rounded-full bg-white/10 hover:bg-white/20 text-white font-semibold text-sm transition-all flex items-center justify-center space-x-2 border border-white/25 backdrop-blur-md shadow-lg">
                <span>Explore Solutions</span>
                <svg class="w-4 h-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </a>
        </div>

        <!-- Trust Badges & Metrics Bar -->
        <div class="pt-8 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto border-t border-white/15 reveal-up">
            <div class="text-center">
                <span class="block font-outfit font-extrabold text-2xl sm:text-3xl text-white drop-shadow-sm">99.8%</span>
                <span class="text-[11px] text-slate-300 uppercase tracking-wider font-semibold mt-1 block">On-Time SLA Delivery</span>
            </div>
            <div class="text-center">
                <span class="block font-outfit font-extrabold text-2xl sm:text-3xl text-emerald-400 drop-shadow-sm">150+</span>
                <span class="text-[11px] text-slate-300 uppercase tracking-wider font-semibold mt-1 block">Enterprise Apps Built</span>
            </div>
            <div class="text-center">
                <span class="block font-outfit font-extrabold text-2xl sm:text-3xl text-cyan-400 drop-shadow-sm">50M+</span>
                <span class="text-[11px] text-slate-300 uppercase tracking-wider font-semibold mt-1 block">User Traffic Processed</span>
            </div>
            <div class="text-center">
                <span class="block font-outfit font-extrabold text-2xl sm:text-3xl text-white drop-shadow-sm">24/7</span>
                <span class="text-[11px] text-slate-300 uppercase tracking-wider font-semibold mt-1 block">Proactive DevOps Support</span>
            </div>
        </div>

    </div>
</section>

<!-- 2. CLIENT LOGOS TICKER (CLEAN WHITE THEME) -->
<section class="py-6 sm:py-7 bg-white border-y border-slate-200/80 relative overflow-hidden">
    <!-- Subtle Background Dot Grid -->
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px] opacity-60 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 text-center mb-5 relative z-10">
        <div class="inline-flex items-center space-x-2.5 px-5 py-2 rounded-full bg-slate-50/90 border border-slate-200 text-xs sm:text-sm font-bold tracking-wider uppercase text-slate-700 shadow-xs">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
            <span>Trusted by Global Enterprises & Tech Leaders</span>
        </div>
    </div>

    <!-- Infinite Seamless Marquee with Smooth Fade Edges -->
    <div class="relative w-full overflow-hidden [mask-image:linear-gradient(to_right,transparent,black_12%,black_88%,transparent)]">
        <div class="flex space-x-6 sm:space-x-8 animate-marquee whitespace-nowrap items-center hover:[animation-play-state:paused] py-2">
            @for ($repeat = 0; $repeat < 4; $repeat++)
                @foreach($clients as $client)
                    <div class="inline-flex items-center space-x-3.5 px-6 py-3 rounded-2xl bg-white hover:bg-slate-50/90 border border-slate-200 hover:border-emerald-400 shadow-sm hover:shadow-md hover:shadow-emerald-500/10 transition-all duration-300 group cursor-pointer hover:-translate-y-0.5">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-emerald-50 to-teal-50 border border-emerald-200/80 flex items-center justify-center text-emerald-600 group-hover:scale-110 group-hover:border-emerald-400 transition-all shadow-xs">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <span class="font-outfit font-bold text-slate-800 group-hover:text-emerald-700 text-sm tracking-wide transition-colors">
                            {{ $client->name }}
                        </span>
                        <span class="text-[10px] uppercase font-bold px-2 py-0.5 rounded-md bg-emerald-50 border border-emerald-200/80 text-emerald-700 tracking-wider">
                            Verified
                        </span>
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</section>

<!-- 3. SERVICES SECTION (WHITE THEME) -->
<section id="services-section" class="pt-12 sm:pt-14 pb-20 sm:pb-24 relative bg-white overflow-hidden">
    <!-- Subtle Grid & Soft Ambient Light -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#f1f5f9_1px,transparent_1px),linear-gradient(to_bottom,#f1f5f9_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_40%,#000_70%,transparent_100%)] pointer-events-none"></div>
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-emerald-100/40 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-10 -right-32 w-96 h-96 bg-cyan-100/40 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 reveal-up">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-xs font-bold uppercase tracking-widest text-emerald-700 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                <span>Our Capabilities</span>
            </div>
            <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight leading-snug">
                Full-Lifecycle <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">Software Engineering</span>
            </h2>
            <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto font-normal leading-relaxed">
                We provide end-to-end technical capabilities required to build scalable enterprise digital ecosystems.
            </p>
        </div>

        @php
            $iconMap = [
                'code-bracket' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>',
                'globe-alt' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/>',
                'device-phone-mobile' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>',
                'cloud' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/>',
                'sparkles' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>',
                'check-badge' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                'user-group' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>'
            ];
        @endphp

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="group relative p-8 sm:p-9 rounded-3xl bg-white border border-slate-200 hover:border-emerald-400 shadow-sm hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between overflow-hidden reveal-up">
                    
                    <!-- Top Accent Gradient Line on Hover -->
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Ambient Hover Background Orb -->
                    <div class="absolute -top-12 -right-12 w-44 h-44 bg-gradient-to-br from-emerald-100/40 to-cyan-100/30 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500 pointer-events-none"></div>

                    <div class="space-y-5 relative z-10">
                        <!-- Modern Icon Box -->
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-50 via-teal-50/60 to-cyan-50 border border-emerald-200/80 flex items-center justify-center text-emerald-600 shadow-xs group-hover:bg-gradient-to-tr group-hover:from-emerald-600 group-hover:to-teal-600 group-hover:text-white group-hover:border-emerald-600 group-hover:scale-110 transition-all duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                {!! $iconMap[$service->icon ?? 'code-bracket'] ?? $iconMap['code-bracket'] !!}
                            </svg>
                        </div>
                        
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 group-hover:text-emerald-700 transition-colors">
                                {{ $service->title }}
                            </h3>
                            <p class="text-slate-600 text-sm leading-relaxed mt-2.5">
                                {{ $service->short_description }}
                            </p>
                        </div>

                        <!-- Key Feature Highlights -->
                        @if(!empty($service->features))
                            <div class="space-y-2.5 pt-4 border-t border-slate-100">
                                @foreach(array_slice($service->features, 0, 3) as $feature)
                                    <div class="flex items-center space-x-2.5 text-xs text-slate-700 font-medium">
                                        <span class="w-5 h-5 rounded-full bg-emerald-50 border border-emerald-200/80 flex items-center justify-center text-emerald-600 shrink-0 group-hover:bg-emerald-500 group-hover:text-white group-hover:border-emerald-500 transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        </span>
                                        <span>{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Card Action Button -->
                    <div class="pt-6 relative z-10">
                        <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center space-x-2 text-xs font-bold text-emerald-700 group-hover:text-emerald-800 bg-emerald-50/80 group-hover:bg-emerald-100 px-4 py-2.5 rounded-full transition-all border border-emerald-200/60 group-hover:border-emerald-300 group/btn">
                            <span>Explore Capability</span>
                            <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 4. INTERACTIVE TECH STACK MATRIX (WHITE THEME) -->
<section x-data="{ activeTab: 'all' }" class="py-24 bg-white border-y border-slate-200/80 relative overflow-hidden">
    <!-- Subtle Ambient Background Grid & Glow -->
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:24px_24px] opacity-60 pointer-events-none"></div>
    <div class="absolute top-1/3 -right-32 w-96 h-96 bg-cyan-100/30 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-10 -left-32 w-96 h-96 bg-emerald-100/30 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto space-y-4 reveal-up">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-cyan-50 border border-cyan-200 text-xs font-bold uppercase tracking-widest text-cyan-700 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-cyan-500 animate-ping"></span>
                <span>Technology Stack</span>
            </div>
            <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight leading-snug">
                Engineered with <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">Battle-Tested Tech</span>
            </h2>
            <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto font-normal leading-relaxed">
                We select modern, resilient, high-throughput technologies for sustainable enterprise software architecture.
            </p>
        </div>

        <!-- Filter Category Tabs -->
        <div class="flex flex-wrap justify-center gap-2.5 reveal-up">
            @php
                $filterCategories = [
                    'all' => '⚡ All Technologies',
                    'backend' => 'Backend & APIs',
                    'frontend' => 'Frontend & Web',
                    'mobile' => 'Mobile Engineering',
                    'database' => 'Database & Storage',
                    'devops' => 'Cloud & DevOps',
                    'ai_ml' => 'AI & Machine Learning'
                ];
            @endphp

            @foreach($filterCategories as $catKey => $catLabel)
                <button @click="activeTab = '{{ $catKey }}'" 
                        :class="activeTab === '{{ $catKey }}' 
                            ? 'bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 text-white font-bold shadow-md shadow-emerald-600/25 border-transparent scale-105' 
                            : 'bg-white hover:bg-slate-50 text-slate-700 font-medium border-slate-200 shadow-xs hover:border-slate-300'"
                        class="px-5 py-2.5 rounded-full text-xs transition-all duration-300 border flex items-center space-x-2 cursor-pointer">
                    <span>{{ $catLabel }}</span>
                </button>
            @endforeach
        </div>

        @php
            $homeTechLogos = [
                'laravel' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg',
                'nodejs' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/nodejs/nodejs-original.svg',
                'python' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg',
                'go' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/go/go-original.svg',
                'react' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/react/react-original.svg',
                'vuejs' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/vuejs/vuejs-original.svg',
                'tailwindcss' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg',
                'typescript' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/typescript/typescript-original.svg',
                'flutter' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/flutter/flutter-original.svg',
                'react-native' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/react/react-original.svg',
                'swift' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/swift/swift-original.svg',
                'kotlin' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kotlin/kotlin-original.svg',
                'mysql' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original.svg',
                'postgresql' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/postgresql/postgresql-original.svg',
                'mongodb' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mongodb/mongodb-original.svg',
                'redis' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/redis/redis-original.svg',
                'docker' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/docker/docker-original.svg',
                'kubernetes' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kubernetes/kubernetes-plain.svg',
                'aws' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/amazonwebservices/amazonwebservices-plain-wordmark.svg',
                'githubactions' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/githubactions/githubactions-original.svg',
                'openai' => 'https://cdn.jsdelivr.net/npm/simple-icons@v10/icons/openai.svg',
                'pytorch' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/pytorch/pytorch-original.svg',
                'tensorflow' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tensorflow/tensorflow-original.svg',
                'opencv' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/opencv/opencv-original.svg',
            ];

            $catBadgeLabels = [
                'backend' => 'Backend',
                'frontend' => 'Frontend',
                'mobile' => 'Mobile',
                'database' => 'Database',
                'devops' => 'DevOps & Cloud',
                'ai_ml' => 'AI & ML',
            ];
        @endphp

        <!-- All Technology Cards Grid -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-5">
            @foreach($technologies as $category => $techGroup)
                @foreach($techGroup as $tech)
                    @php
                        $tLogo = $homeTechLogos[$tech->icon] ?? 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/devicon/devicon-original.svg';
                    @endphp
                    <div x-show="activeTab === 'all' || activeTab === '{{ $category }}'" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-90"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="group relative p-6 rounded-3xl bg-white border border-slate-200 hover:border-emerald-400 shadow-sm hover:shadow-xl hover:shadow-emerald-500/10 transition-all duration-300 hover:-translate-y-1.5 flex flex-col items-center justify-between text-center overflow-hidden">
                        
                        <!-- Top Accent Highlight -->
                        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Ambient Hover Glow -->
                        <div class="absolute -top-10 -right-10 w-28 h-28 bg-gradient-to-br from-emerald-100/50 to-cyan-100/30 rounded-full blur-xl group-hover:scale-150 transition-transform duration-500 pointer-events-none"></div>

                        <!-- Tech Icon -->
                        <div class="w-16 h-16 rounded-2xl bg-slate-50 group-hover:bg-white border border-slate-200/80 group-hover:border-emerald-200 p-3.5 flex items-center justify-center shadow-xs group-hover:scale-110 transition-all duration-300 relative z-10">
                            <img src="{{ $tLogo }}" alt="{{ $tech->name }} Logo" class="h-full w-full object-contain filter drop-shadow-xs">
                        </div>

                        <!-- Tech Name & Category Pill -->
                        <div class="mt-4 space-y-1.5 relative z-10">
                            <span class="block font-outfit font-bold text-slate-900 group-hover:text-emerald-700 text-sm tracking-wide transition-colors">
                                {{ $tech->name }}
                            </span>
                            <span class="inline-block text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 group-hover:bg-emerald-50 group-hover:text-emerald-700 border border-slate-200/60 group-hover:border-emerald-200/80 transition-colors">
                                {{ $catBadgeLabels[$category] ?? ucfirst($category) }}
                            </span>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>

    </div>
</section>

<!-- 5. FEATURED CASE STUDIES (WHITE THEME) -->
<section class="py-28 bg-white relative overflow-hidden">
    <!-- Subtle Grid & Soft Ambient Light -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#f1f5f9_1px,transparent_1px),linear-gradient(to_bottom,#f1f5f9_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_40%,#000_70%,transparent_100%)] pointer-events-none"></div>
    <div class="absolute top-1/4 -right-32 w-96 h-96 bg-emerald-100/35 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-10 -left-32 w-96 h-96 bg-cyan-100/35 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16 relative z-10">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 reveal-up">
            <div class="space-y-4 max-w-2xl">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-xs font-bold uppercase tracking-widest text-emerald-700 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                    <span>Case Studies</span>
                </div>
                <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight leading-snug">
                    Proven Results for <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">Enterprise Clients</span>
                </h2>
                <p class="text-slate-600 text-base sm:text-lg font-normal leading-relaxed">
                    Real-world enterprise software deployments engineered with high throughput, mission-critical security, and measurable ROI.
                </p>
            </div>
            
            <a href="{{ route('projects') }}" class="inline-flex items-center space-x-2.5 px-6 py-3.5 rounded-full bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition-all shadow-md shadow-slate-900/10 hover:shadow-lg hover:scale-105 group self-start md:self-end shrink-0">
                <span>View All Featured Projects</span>
                <svg class="w-4 h-4 text-emerald-400 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <!-- Case Studies Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolios as $portfolio)
                <div class="group relative bg-white rounded-3xl overflow-hidden border border-slate-200 hover:border-emerald-400 shadow-sm hover:shadow-2xl hover:shadow-emerald-500/10 transition-all duration-300 hover:-translate-y-2 flex flex-col justify-between reveal-up">
                    
                    <!-- Top Accent Gradient Line on Hover -->
                    <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Ambient Hover Background Glow -->
                    <div class="absolute -top-12 -right-12 w-44 h-44 bg-gradient-to-br from-emerald-100/40 to-cyan-100/30 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-500 pointer-events-none"></div>

                    <div class="p-8 space-y-5 relative z-10">
                        <!-- Top Metadata -->
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-[11px] px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200/80 font-bold uppercase tracking-wider shadow-2xs">
                                {{ $portfolio->category }}
                            </span>
                            <span class="text-xs text-slate-500 font-mono line-clamp-1">
                                {{ $portfolio->client_name }}
                            </span>
                        </div>

                        <!-- Project Title -->
                        <div>
                            <h3 class="font-outfit font-bold text-xl text-slate-900 group-hover:text-emerald-700 transition-colors leading-snug">
                                <a href="{{ route('projects.show', $portfolio->slug) }}">{{ $portfolio->title }}</a>
                            </h3>
                        </div>
                        
                        <!-- Challenge / Description -->
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed line-clamp-3">
                            {{ $portfolio->challenge }}
                        </p>

                        <!-- Impact Metrics Matrix -->
                        @if(!empty($portfolio->impact_metrics))
                            <div class="p-4 rounded-2xl bg-gradient-to-br from-slate-50 to-emerald-50/30 border border-slate-200/80 grid grid-cols-2 gap-3">
                                @foreach(array_slice($portfolio->impact_metrics, 0, 2) as $label => $val)
                                    <div class="space-y-0.5">
                                        <span class="block font-outfit font-extrabold text-base text-emerald-600 tracking-tight">{{ $val }}</span>
                                        <span class="block text-[10px] text-slate-500 font-semibold uppercase tracking-wider line-clamp-1">{{ $label }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Tech Stack Tags -->
                        @if(!empty($portfolio->tech_stack))
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                @foreach(array_slice($portfolio->tech_stack, 0, 3) as $tech)
                                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-slate-100 text-slate-600 border border-slate-200/60">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Footer Action Buttons -->
                    <div class="p-8 pt-0 flex items-center space-x-3 relative z-10">
                        <a href="{{ route('projects.show', $portfolio->slug) }}" class="flex-1 text-center py-3 rounded-xl bg-slate-50 group-hover:bg-emerald-50/90 border border-slate-200/80 group-hover:border-emerald-200 text-xs font-bold text-slate-800 group-hover:text-emerald-700 transition-all flex items-center justify-center space-x-2 shadow-2xs">
                            <span>Project Case Study</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        @if(!empty($portfolio->project_url))
                            <a href="{{ $portfolio->project_url }}" target="_blank" rel="noopener noreferrer" class="py-3 px-3.5 rounded-xl bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 text-emerald-700 text-xs font-bold transition-all shrink-0 flex items-center space-x-1 shadow-2xs hover:scale-105" title="Live Website">
                                <span>Live</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 6. INTERACTIVE PROJECT COST ESTIMATOR -->
<section id="estimator" x-data="{
    serviceType: 'custom_software',
    platform: 'web',
    timeline: 'standard',
    get estimatedCost() {
        let base = 350000;
        if (this.serviceType === 'web_app') base = 150000;
        if (this.serviceType === 'mobile_app') base = 250000;
        if (this.serviceType === 'ai_ml') base = 400000;
        if (this.platform === 'both') base += 100000;
        if (this.timeline === 'urgent') base += 50000;
        return '৳ ' + base.toLocaleString('en-IN') + ' BDT';
    }
}" class="py-24 bg-slate-50 border-y border-slate-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="text-center space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200">Instant Estimator</span>
            <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight leading-snug">Estimate Your Software Project Cost</h2>
            <p class="text-slate-600 text-sm">Select options to calculate an instant estimated engineering budget for your business.</p>
        </div>

        <div class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-xl grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <!-- Option 1: Service Type -->
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-700 mb-3">1. Select Required Service</label>
                    <div class="grid grid-cols-2 gap-3">
                        <button @click="serviceType = 'custom_software'" :class="serviceType === 'custom_software' ? 'border-emerald-500 bg-emerald-50 text-emerald-800 font-bold' : 'border-slate-200 text-slate-600 hover:bg-slate-50'" class="p-4 rounded-xl border text-left text-xs font-semibold transition-all">
                            Enterprise Software
                        </button>
                        <button @click="serviceType = 'web_app'" :class="serviceType === 'web_app' ? 'border-emerald-500 bg-emerald-50 text-emerald-800 font-bold' : 'border-slate-200 text-slate-600 hover:bg-slate-50'" class="p-4 rounded-xl border text-left text-xs font-semibold transition-all">
                            Web Application
                        </button>
                        <button @click="serviceType = 'mobile_app'" :class="serviceType === 'mobile_app' ? 'border-emerald-500 bg-emerald-50 text-emerald-800 font-bold' : 'border-slate-200 text-slate-600 hover:bg-slate-50'" class="p-4 rounded-xl border text-left text-xs font-semibold transition-all">
                            Mobile App (iOS/Android)
                        </button>
                        <button @click="serviceType = 'ai_ml'" :class="serviceType === 'ai_ml' ? 'border-emerald-500 bg-emerald-50 text-emerald-800 font-bold' : 'border-slate-200 text-slate-600 hover:bg-slate-50'" class="p-4 rounded-xl border text-left text-xs font-semibold transition-all">
                            AI / GenAI Solution
                        </button>
                    </div>
                </div>

                <!-- Option 2: Target Platform -->
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-700 mb-3">2. Target Ecosystem</label>
                    <div class="grid grid-cols-3 gap-3">
                        <button @click="platform = 'web'" :class="platform === 'web' ? 'border-cyan-500 bg-cyan-50 text-cyan-800 font-bold' : 'border-slate-200 text-slate-600 hover:bg-slate-50'" class="p-3 rounded-xl border text-center text-xs font-semibold transition-all">Web Only</button>
                        <button @click="platform = 'mobile'" :class="platform === 'mobile' ? 'border-cyan-500 bg-cyan-50 text-cyan-800 font-bold' : 'border-slate-200 text-slate-600 hover:bg-slate-50'" class="p-3 rounded-xl border text-center text-xs font-semibold transition-all">Mobile Only</button>
                        <button @click="platform = 'both'" :class="platform === 'both' ? 'border-cyan-500 bg-cyan-50 text-cyan-800 font-bold' : 'border-slate-200 text-slate-600 hover:bg-slate-50'" class="p-3 rounded-xl border text-center text-xs font-semibold transition-all">Cross-Platform</button>
                    </div>
                </div>
            </div>

            <!-- Estimated Calculation Result Box -->
            <div class="p-6 rounded-2xl bg-gradient-to-b from-slate-900 to-slate-950 text-white border border-slate-800 flex flex-col justify-between space-y-6 shadow-xl">
                <div>
                    <span class="text-xs uppercase font-semibold text-slate-400 block">Estimated Starting Cost</span>
                    <span class="font-outfit font-black text-4xl text-gradient block mt-2" x-text="estimatedCost"></span>
                    <span class="text-[11px] text-slate-400 block mt-1">*Includes architecture design, QA & 60 days DevOps warranty.</span>
                </div>

                <a href="{{ route('contact') }}" class="w-full block text-center py-3.5 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-500 text-white font-bold text-xs shadow-lg shadow-emerald-500/30">
                    Lock Estimate & Schedule Call
                </a>
            </div>
        </div>

    </div>
</section>

<!-- 7. CLIENT TESTIMONIALS -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200">Client Feedback</span>
            <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 tracking-tight leading-snug">What Global CTOs Say About Us</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-lg shadow-slate-200/40 space-y-6 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex text-amber-400 space-x-1 text-sm">
                            @for($i = 0; $i < $testimonial->rating; $i++) ★ @endfor
                        </div>
                        <p class="text-slate-600 text-xs italic leading-relaxed">"{{ $testimonial->comment }}"</p>
                    </div>

                    <div class="flex items-center space-x-3 pt-4 border-t border-slate-100">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-emerald-500 to-cyan-500 flex items-center justify-center font-bold text-white text-sm">
                            {{ substr($testimonial->client_name, 0, 1) }}
                        </div>
                        <div>
                            <span class="block font-semibold text-sm text-slate-900">{{ $testimonial->client_name }}</span>
                            <span class="block text-xs text-slate-500">{{ $testimonial->designation }}, {{ $testimonial->company }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- 8. FINAL CTA BANNER -->
<section class="py-20 relative overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-emerald-50 via-teal-50 to-cyan-50 p-12 sm:p-16 rounded-3xl text-center space-y-8 relative overflow-hidden border border-emerald-200 shadow-xl">
            <div class="absolute -top-24 -left-24 w-72 h-72 bg-emerald-200/40 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-cyan-200/40 rounded-full blur-3xl"></div>

            <h2 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 max-w-2xl mx-auto leading-snug tracking-tight">
                Ready to Architect Your Next Enterprise Software Solution?
            </h2>

            <p class="text-slate-600 text-base max-w-2xl mx-auto">
                Schedule a 30-minute discovery session with our senior software architects to review your technical requirements.
            </p>

            <div class="pt-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center space-x-3 px-8 py-4 rounded-full bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 text-white font-bold text-base shadow-xl shadow-emerald-500/30 hover:scale-105 transition-all">
                    <span>Schedule Discovery Call</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const canvas = document.getElementById('hero-particle-canvas');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');

        let width = canvas.width = canvas.parentElement.offsetWidth;
        let height = canvas.height = canvas.parentElement.offsetHeight;

        window.addEventListener('resize', () => {
            width = canvas.width = canvas.parentElement.offsetWidth;
            height = canvas.height = canvas.parentElement.offsetHeight;
        });

        const particles = [];
        const particleCount = 45;

        for (let i = 0; i < particleCount; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                vx: (Math.random() - 0.5) * 0.6,
                vy: (Math.random() - 0.5) * 0.6,
                radius: Math.random() * 2 + 1,
                color: Math.random() > 0.5 ? '#059669' : '#0891B2'
            });
        }

        let mouse = { x: null, y: null };
        window.addEventListener('mousemove', (e) => {
            const rect = canvas.getBoundingClientRect();
            mouse.x = e.clientX - rect.left;
            mouse.y = e.clientY - rect.top;
        });

        function animate() {
            ctx.clearRect(0, 0, width, height);

            particles.forEach((p, i) => {
                p.x += p.vx;
                p.y += p.vy;

                if (p.x < 0 || p.x > width) p.vx *= -1;
                if (p.y < 0 || p.y > height) p.vy *= -1;

                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = p.color;
                ctx.fill();

                for (let j = i + 1; j < particles.length; j++) {
                    const p2 = particles[j];
                    const dx = p.x - p2.x;
                    const dy = p.y - p2.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);

                    if (dist < 130) {
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(p2.x, p2.y);
                        ctx.strokeStyle = `rgba(5, 150, 105, ${0.15 - dist / 1300})`;
                        ctx.lineWidth = 0.8;
                        ctx.stroke();
                    }
                }

                if (mouse.x && mouse.y) {
                    const dx = p.x - mouse.x;
                    const dy = p.y - mouse.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < 150) {
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(mouse.x, mouse.y);
                        ctx.strokeStyle = `rgba(8, 145, 178, ${0.25 - dist / 600})`;
                        ctx.lineWidth = 1;
                        ctx.stroke();
                    }
                }
            });

            requestAnimationFrame(animate);
        }

        animate();
    });
</script>
@endpush

@endsection
