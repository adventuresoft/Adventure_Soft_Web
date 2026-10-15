@extends('layouts.app')

@section('title', 'About Adventure Soft — Leadership & Mission')

@section('content')

<!-- =========================================================
     Section 1: ABOUT US (WHITE THEME WITH UNIQUE AESTHETIC ANIMATION)
     ========================================================= -->
<section class="about-hero-section py-20 lg:py-24 bg-white relative overflow-hidden border-b border-slate-100">
    <!-- Ambient Background Lighting Orbs -->
    <div class="ambient-orb orb-1"></div>
    <div class="ambient-orb orb-2"></div>
    <div class="about-grid-pattern"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header: Centered, Bold, Italic, Underlined ABOUT US with Animated Shimmer Line -->
        <div class="text-center mb-14 lg:mb-16 space-y-3">
            <span class="inline-flex items-center space-x-2 px-3.5 py-1 rounded-full text-xs font-bold tracking-widest text-emerald-700 bg-emerald-50 border border-emerald-200/80 shadow-2xs">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                <span>COMPANY OVERVIEW</span>
            </span>
            
            <div>
                <h1 class="about-us-title inline-block font-outfit text-3xl sm:text-4xl md:text-5xl font-black italic tracking-widest text-slate-900 uppercase relative pb-3">
                    ABOUT US
                    <!-- Aesthetic Animated Underline with Shimmer -->
                    <span class="about-title-underline">
                        <span class="about-title-shimmer"></span>
                    </span>
                </h1>
            </div>
        </div>

        <!-- 2-Column Layout: About Description on Left, Animated Floating Brand Card on Right -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            
            <!-- Left Column: About Us Information Text -->
            <div class="lg:col-span-6 xl:col-span-7 space-y-6">
                <div class="relative pl-6 sm:pl-7 border-l-4 border-emerald-500/80">
                    <p class="text-[15px] sm:text-[16px] lg:text-[16.5px] text-slate-700 leading-relaxed sm:leading-loose font-normal text-left sm:text-justify">
                        A team of enthusiastic designers, developers and entrepreneurs who decided to merge their experiences together under one tree to offer you the best output for your desired software/IT solution. No matter how small or how big your project is, please bring it to us without any hesitation. We take every project as a challenge and always try to give the best effort. Our efforts focus on concept, design, development and re-engineering of web businesses. We are working closely with software majors on new applications for user demographics to the history of purchase decisions with instant comparisons from distributed databases.
                    </p>
                </div>

                <!-- Subtle Feature Badges -->
                <div class="flex flex-wrap gap-3 pt-2">
                    <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-xl bg-slate-50 border border-slate-200/80 text-xs font-semibold text-slate-700 shadow-2xs">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Full-Lifecycle Engineering</span>
                    </div>
                    <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-xl bg-slate-50 border border-slate-200/80 text-xs font-semibold text-slate-700 shadow-2xs">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Enterprise High-Availability</span>
                    </div>
                    <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-xl bg-slate-50 border border-slate-200/80 text-xs font-semibold text-slate-700 shadow-2xs">
                        <span class="text-emerald-600 font-bold">✓</span>
                        <span>Dedicated Tech Innovation</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: Adventure Soft Logo & Brand Card (Large Size, Animated Floating Jewel Card) -->
            <div class="lg:col-span-6 xl:col-span-5 flex justify-center">
                <div class="brand-showcase-wrapper relative w-full max-w-lg">
                    
                    <!-- Ambient Dynamic Gradient Aura behind Card (Pulsing & Floating) -->
                    <div class="brand-card-aura"></div>

                    <!-- Floating Brand Card (Glassmorphic White Luxury) -->
                    <div class="brand-showcase-card relative rounded-3xl p-8 sm:p-12 border border-slate-200/90 shadow-[0_25px_60px_-15px_rgba(16,185,129,0.18)] bg-white/95 backdrop-blur-xl overflow-hidden flex items-center justify-center group">
                        
                        <!-- Top Shimmer Accent Line on the Card -->
                        <div class="brand-card-top-shine"></div>

                        <!-- Card Mesh Watermark -->
                        <div class="brand-card-pattern"></div>

                        <!-- Navbar-Style Logo & Name Showcase (Large Scale) -->
                        <div class="relative z-10 flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-5 text-center sm:text-left">
                            
                            <!-- Logo Icon Container (with Halo Glow & Micro Hover Tilt) -->
                            <div class="brand-icon-box relative shrink-0">
                                <div class="brand-icon-pulse"></div>
                                <div class="h-20 w-20 sm:h-24 sm:w-24 rounded-2xl bg-white border border-slate-200 shadow-lg p-2.5 sm:p-3 flex items-center justify-center overflow-hidden transition-transform duration-500 group-hover:scale-108 group-hover:rotate-3">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="Adventure Soft Icon" class="h-full w-full object-contain">
                                </div>
                            </div>

                            <!-- Adventure Soft Logo Text & Slogan -->
                            <div class="flex flex-col justify-center space-y-2">
                                <img src="{{ asset('assets/images/adventure_soft_logo_text.png') }}" alt="Adventure Soft" class="h-7 sm:h-9 md:h-10 w-auto max-w-[210px] sm:max-w-[260px] object-contain object-center sm:object-left transition-transform duration-300 group-hover:translate-x-1">
                                <span class="text-xs sm:text-[13px] font-semibold text-emerald-600 tracking-tight block whitespace-normal sm:whitespace-nowrap">
                                    For Comfortable Life with Technology
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- =========================================================
     Section 2: Leadership Team Showcase
     ========================================================= -->
<section class="py-20 bg-white border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200">Leadership Team</span>
            <h2 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 tracking-tight leading-snug">Meet Our Engineering Leaders</h2>
            <div class="mx-auto h-1 w-16 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-700"></div>
            <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
                We believe, <em>"Great things in business are never done by one person. They are done by a team of people."</em>
                <span class="font-semibold text-slate-800">— Steve Jobs</span>
            </p>
            <p class="text-slate-500 text-sm">Meet our awesome team members.</p>
        </div>

        @if($teams->isEmpty())
            <p class="text-center text-sm text-slate-500">Team members will be announced soon.</p>
        @else
            @php
                $companySocials = [
                    'facebook'  => ['icon' => 'fa-brands fa-facebook-f',  'label' => 'Facebook',  'default' => 'https://facebook.com/adventuresoft'],
                    'instagram' => ['icon' => 'fa-brands fa-instagram',   'label' => 'Instagram', 'default' => 'https://instagram.com/adventuresoft'],
                    'linkedin'  => ['icon' => 'fa-brands fa-linkedin-in', 'label' => 'LinkedIn',  'default' => 'https://linkedin.com/company/adventuresoft'],
                    'youtube'   => ['icon' => 'fa-brands fa-youtube',     'label' => 'YouTube',   'default' => 'https://youtube.com/@adventuresoft'],
                    'github'    => ['icon' => 'fa-brands fa-github',      'label' => 'GitHub',    'default' => 'https://github.com/adventuresoft'],
                    'pinterest' => ['icon' => 'fa-brands fa-pinterest',   'label' => 'Pinterest', 'default' => 'https://pinterest.com/adventuresoft'],
                ];

                $deptBadges = [
                    'CEO & Founder' => ['class' => 'bg-amber-50 text-amber-800 border-amber-200/80', 'icon' => '👑'],
                    'Executive Leadership' => ['class' => 'bg-emerald-50 text-emerald-800 border-emerald-200/80', 'icon' => '👔'],
                    'Software Engineering' => ['class' => 'bg-indigo-50 text-indigo-800 border-indigo-200/80', 'icon' => '💻'],
                    'UI/UX & Product Design' => ['class' => 'bg-purple-50 text-purple-800 border-purple-200/80', 'icon' => '🎨'],
                    'Operations & HR' => ['class' => 'bg-cyan-50 text-cyan-800 border-cyan-200/80', 'icon' => '🏢'],
                    'Digital Marketing' => ['class' => 'bg-rose-50 text-rose-800 border-rose-200/80', 'icon' => '📈'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-7 max-w-6xl mx-auto">
                @foreach($teams as $cardIdx => $team)
                    @php
                        $deptKey = $team->department ?? 'Software Engineering';
                        $badge = $deptBadges[$deptKey] ?? ['class' => 'bg-slate-50 text-slate-700 border-slate-200', 'icon' => '✨'];
                    @endphp
                    <article class="team-card group relative" style="--stagger-delay: {{ $cardIdx * 0.05 }}s;">
                        <!-- Top Ambient Shimmer Light Bar -->
                        <div class="card-accent-bar"></div>

                        <!-- Subtle Background Tech Mesh Pattern -->
                        <div class="card-mesh-bg"></div>

                        <!-- Soft Ambient Radial Aura behind Avatar -->
                        <div class="avatar-ambient-aura"></div>

                        <!-- Top Section: Avatar with Rotating Animated Green Halo & Ping Dot -->
                        <div class="pt-8 px-5 flex justify-center relative z-10">
                            <div class="team-avatar-container">
                                <!-- Rotating Conic Aura Halo -->
                                <div class="avatar-rotating-halo"></div>

                                <!-- Main Circular Green Ring Frame -->
                                <div class="team-avatar">
                                    @if($team->photo_url)
                                        <img src="{{ $team->photo_url }}" alt="{{ $team->name }}" loading="lazy"
                                             class="w-full h-full object-cover object-top rounded-full transition-transform duration-500 group-hover:scale-110">
                                    @else
                                        <div class="w-full h-full rounded-full bg-gradient-to-br from-emerald-500 via-teal-600 to-emerald-800 flex items-center justify-center font-outfit font-bold text-2xl text-white shadow-inner">
                                            {{ $team->initials }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Active Status Live Pulse Dot -->
                                <div class="avatar-status-dot" title="Active Team Member">
                                    <span class="status-ping"></span>
                                    <span class="status-core"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Middle Section: Unique Department Badge, Name & Role -->
                        <div class="flex-1 flex flex-col items-center justify-center text-center px-4 pt-4 pb-6 space-y-2 relative z-10">
                            @if(!empty($team->department))
                                <span class="inline-flex items-center space-x-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-semibold tracking-wider uppercase border shadow-2xs {{ $badge['class'] }} transition-transform duration-300 group-hover:scale-105">
                                    <span>{{ $badge['icon'] }}</span>
                                    <span>{{ $team->department }}</span>
                                </span>
                            @endif

                            <div class="space-y-1">
                                <h3 class="font-outfit font-extrabold text-[16.5px] text-slate-900 leading-tight group-hover:text-emerald-700 transition-colors duration-300">
                                    {{ $team->name }}
                                </h3>
                                <p class="font-sans text-[13px] text-slate-500 font-medium leading-snug group-hover:text-slate-700 transition-colors">
                                    {{ $team->designation }}
                                </p>
                            </div>
                        </div>

                        <!-- Bottom Section: Aesthetic Multi-Layer Fluid Wave Footer with Frosted Glass Bubbles -->
                        <div class="team-footer-wrap relative mt-auto w-full z-10 overflow-hidden">
                            <div class="team-social-shimmer"></div>

                            <!-- Multi-Layer Fluid Wave Crest -->
                            <div class="team-wave-header relative w-full overflow-hidden leading-none select-none">
                                <svg class="team-wave-svg w-full block" viewBox="0 0 360 36" preserveAspectRatio="none">
                                    <defs>
                                        <linearGradient id="waveFrontGrad-{{ $team->id }}" x1="0%" y1="0%" x2="100%" y2="0%">
                                            <stop offset="0%" stop-color="#10b981" />
                                            <stop offset="30%" stop-color="#059669" />
                                            <stop offset="70%" stop-color="#047857" />
                                            <stop offset="100%" stop-color="#064e3b" />
                                        </linearGradient>
                                        <linearGradient id="waveBackGrad-{{ $team->id }}" x1="0%" y1="0%" x2="100%" y2="0%">
                                            <stop offset="0%" stop-color="#6ee7b7" stop-opacity="0.55" />
                                            <stop offset="50%" stop-color="#34d399" stop-opacity="0.38" />
                                            <stop offset="100%" stop-color="#10b981" stop-opacity="0.2" />
                                        </linearGradient>
                                    </defs>
                                    <!-- Layer 1: Ambient Translucent Crest Wave -->
                                    <path class="wave-back" d="M0,12 C80,24 160,4 250,22 C300,30 335,16 360,8 L360,36 L0,36 Z" fill="url(#waveBackGrad-{{ $team->id }})" />
                                    <!-- Layer 2: Main Emerald Wave -->
                                    <path class="wave-front" d="M0,22 C90,8 180,28 270,12 C315,4 340,16 360,14 L360,36 L0,36 Z" fill="url(#waveFrontGrad-{{ $team->id }})" />
                                    <!-- Layer 3: Glass Edge Rim Highlight Line -->
                                    <path class="wave-rim" d="M0,22 C90,8 180,28 270,12 C315,4 340,16 360,14" fill="none" stroke="rgba(255, 255, 255, 0.45)" stroke-width="1.2" stroke-linecap="round" />
                                </svg>
                            </div>

                            <!-- Social Bar Body -->
                            <div class="team-social-body relative z-10 w-full px-2 pt-0.5 pb-3.5">
                                <div class="flex items-center justify-around w-full">
                                    @php $iconIdx = 0; @endphp
                                    @foreach($companySocials as $netKey => $netMeta)
                                        @php
                                            $url = (!empty($team->social_links[$netKey])) 
                                                ? $team->social_links[$netKey] 
                                                : $netMeta['default'];
                                        @endphp
                                        <div class="social-bubble" style="--i: {{ $iconIdx++ }};">
                                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                                               class="social-link"
                                               aria-label="{{ $team->name }} on {{ $netMeta['label'] }}"
                                               title="{{ $netMeta['label'] }}">
                                                <i class="{{ $netMeta['icon'] }}"></i>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

<!-- Company Mission & Vision -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-700">Our Vision & Mission</span>
                <h3 class="font-outfit font-extrabold text-2xl sm:text-3xl text-slate-900 leading-snug tracking-tight">Empowering Global Industry Leaders Through Technology</h3>
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
                <h4 class="font-outfit font-bold text-lg sm:text-xl text-slate-900">Core Engineering Principles</h4>
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
    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">
<style>
    /* =========================================================
       Section 1: About Us Unique Aesthetic Animations
       ========================================================= */

    /* Ambient Background Floating Orbs */
    .ambient-orb {
        position: absolute;
        border-radius: 9999px;
        filter: blur(65px);
        pointer-events: none;
        opacity: 0.65;
        animation: floatOrb 12s ease-in-out infinite alternate;
    }
    .orb-1 {
        top: -40px;
        left: 8%;
        width: 320px;
        height: 320px;
        background: radial-gradient(circle, rgba(16, 185, 129, 0.14) 0%, transparent 70%);
    }
    .orb-2 {
        bottom: -40px;
        right: 6%;
        width: 360px;
        height: 360px;
        background: radial-gradient(circle, rgba(20, 184, 166, 0.15) 0%, transparent 70%);
        animation-delay: -6s;
    }

    @keyframes floatOrb {
        0% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-22px) scale(1.08); }
        100% { transform: translateY(16px) scale(0.94); }
    }

    /* Subtle Tech Dot Background Pattern */
    .about-grid-pattern {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(15, 23, 42, 0.045) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
        opacity: 0.75;
    }

    /* Title Animated Underline with Gliding Shimmer Light */
    .about-title-underline {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4.5px;
        border-radius: 9999px;
        background: linear-gradient(90deg, #10b981 0%, #059669 50%, #047857 100%);
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(16, 185, 129, 0.35);
    }

    .about-title-shimmer {
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.95), transparent);
        animation: titleShimmer 3.2s ease-in-out infinite;
    }

    @keyframes titleShimmer {
        0%, 15% { left: -100%; }
        50%, 65% { left: 160%; }
        100% { left: 160%; }
    }

    /* Floating Levitation Animation on Brand Showcase Card */
    .brand-showcase-wrapper {
        animation: floatBrandCard 6s ease-in-out infinite;
        will-change: transform;
    }

    @keyframes floatBrandCard {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-9px);
        }
    }

    /* Ambient Pulsing Aura Behind Card */
    .brand-card-aura {
        position: absolute;
        inset: -14px;
        border-radius: 36px;
        background: conic-gradient(from 180deg at 50% 50%, rgba(16, 185, 129, 0.22), rgba(20, 184, 166, 0.28), rgba(52, 211, 153, 0.18), rgba(16, 185, 129, 0.22));
        filter: blur(22px);
        opacity: 0.6;
        transition: opacity .5s ease, filter .5s ease;
        animation: rotateAura 12s linear infinite;
        pointer-events: none;
    }

    .brand-showcase-wrapper:hover .brand-card-aura {
        opacity: 0.9;
        filter: blur(28px);
    }

    @keyframes rotateAura {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Brand Card Top Gloss Shine */
    .brand-card-top-shine {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, #34d399 50%, transparent 100%);
    }

    .brand-icon-pulse {
        position: absolute;
        inset: -4px;
        border-radius: 20px;
        background: #10b981;
        opacity: 0;
        filter: blur(8px);
        transition: opacity .4s ease;
    }

    .brand-showcase-card:hover .brand-icon-pulse {
        opacity: 0.45;
    }

    /* =========================================================
       Section 2: Aesthetic Team Card Design & Animations
       ========================================================= */

    .team-card {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 310px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 20px -4px rgba(15, 23, 42, 0.06), 0 1px 3px rgba(0, 0, 0, 0.04);
        transition: transform .4s cubic-bezier(0.34, 1.56, 0.64, 1),
                    box-shadow .4s cubic-bezier(0.34, 1.56, 0.64, 1),
                    border-color .4s ease;
        will-change: transform, box-shadow;
    }

    .team-card:hover {
        transform: translateY(-8px);
        border-color: rgba(34, 197, 94, 0.55);
        box-shadow: 0 25px 45px -12px rgba(16, 185, 129, 0.22),
                    0 10px 18px -6px rgba(0, 0, 0, 0.06),
                    0 0 0 1px rgba(34, 197, 94, 0.2);
    }

    /* Top Shimmer Accent Line */
    .card-accent-bar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent 0%, #4ade80 50%, transparent 100%);
        opacity: 0;
        transform: scaleX(0.4);
        transition: opacity .4s ease, transform .4s ease;
        z-index: 20;
    }
    .team-card:hover .card-accent-bar {
        opacity: 1;
        transform: scaleX(1);
    }

    /* Subtle Modern Tech Mesh Background Pattern */
    .card-mesh-bg {
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(16, 185, 129, 0.12) 1px, transparent 1px);
        background-size: 16px 16px;
        opacity: 0;
        transition: opacity .5s ease;
        pointer-events: none;
        z-index: 1;
    }
    .team-card:hover .card-mesh-bg {
        opacity: 0.6;
    }

    /* Ambient Glow Behind Avatar */
    .avatar-ambient-aura {
        position: absolute;
        top: 30px;
        left: 50%;
        transform: translateX(-50%);
        width: 140px;
        height: 140px;
        background: radial-gradient(circle, rgba(34, 197, 94, 0.18) 0%, rgba(16, 185, 129, 0.05) 50%, transparent 75%);
        border-radius: 9999px;
        filter: blur(14px);
        opacity: 0.5;
        transition: opacity .5s ease, transform .5s ease;
        pointer-events: none;
        z-index: 2;
    }
    .team-card:hover .avatar-ambient-aura {
        opacity: 1;
        transform: translateX(-50%) scale(1.2);
    }

    /* Avatar Container & Rotating Conic Halo */
    .team-avatar-container {
        position: relative;
        width: 108px;
        height: 108px;
    }

    .avatar-rotating-halo {
        position: absolute;
        inset: -4px;
        border-radius: 9999px;
        background: conic-gradient(from 0deg, #4ade80, #22c55e, #10b981, #059669, #4ade80);
        opacity: 0;
        filter: blur(4px);
        transition: opacity .4s ease;
        animation: spinConic 6s linear infinite;
        z-index: 1;
    }
    .team-card:hover .avatar-rotating-halo {
        opacity: 0.85;
    }

    @keyframes spinConic {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .team-avatar {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 3.5px;
        border-radius: 9999px;
        background: linear-gradient(135deg, #4ade80 0%, #22c55e 50%, #15803d 100%);
        box-shadow: 0 0 16px rgba(34, 197, 94, 0.35);
        transition: transform .4s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow .4s ease;
        z-index: 2;
    }
    .team-avatar > * {
        border: 2.5px solid #ffffff;
    }
    .team-card:hover .team-avatar {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(34, 197, 94, 0.6);
    }

    /* Live Active Status Indicator Dot */
    .avatar-status-dot {
        position: absolute;
        bottom: 3px;
        right: 4px;
        width: 14px;
        height: 14px;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .status-ping {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 9999px;
        background-color: #22c55e;
        opacity: 0.75;
        animation: pingEffect 2s cubic-bezier(0, 0, 0.2, 1) infinite;
    }
    .status-core {
        position: relative;
        width: 10px;
        height: 10px;
        border-radius: 9999px;
        background-color: #16a34a;
        border: 2px solid #ffffff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    @keyframes pingEffect {
        75%, 100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    /* Aesthetic Multi-Layer Fluid Wave Footer */
    .team-footer-wrap {
        position: relative;
        margin-top: auto;
        width: 100%;
        overflow: hidden;
        border-radius: 0 0 17px 17px;
    }

    .team-wave-header {
        position: relative;
        width: 100%;
        height: 32px;
        line-height: 0;
        margin-bottom: -1px; /* seamless sub-pixel overlap */
        pointer-events: none;
    }

    .team-wave-svg {
        width: 100%;
        height: 100%;
        display: block;
        transform-origin: bottom center;
        transition: transform .45s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .team-wave-svg .wave-back {
        transform-box: fill-box;
        transform-origin: center;
        transition: transform .45s cubic-bezier(0.34, 1.56, 0.64, 1), opacity .35s ease;
    }

    .team-wave-svg .wave-front {
        transform-box: fill-box;
        transform-origin: center;
        transition: transform .4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .team-card:hover .team-wave-svg .wave-back {
        transform: translateY(-2.5px);
        opacity: 0.95;
    }

    .team-card:hover .team-wave-svg .wave-front {
        transform: translateY(-1px);
    }

    .team-social-body {
        position: relative;
        width: 100%;
        background: linear-gradient(100deg, #10b981 0%, #059669 30%, #047857 70%, #064e3b 100%);
        background-size: 160% 100%;
        background-position: 0% 0%;
        padding: 2px 10px 13px;
        min-height: 46px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        transition: background-position .6s cubic-bezier(0.4, 0, 0.2, 1), filter .4s ease;
    }

    .team-card:hover .team-social-body {
        background-position: 100% 0%;
        filter: brightness(1.04);
    }

    /* Ambient Light Shimmer Across Entire Green Footer */
    .team-social-shimmer {
        position: absolute;
        top: 0;
        left: -120%;
        width: 60%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transform: skewX(-25deg);
        transition: left .75s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        z-index: 30;
    }

    .team-card:hover .team-social-shimmer {
        left: 180%;
    }

    /* Frosted Glass Social Bubble & Stagger Lift */
    .social-bubble {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform .35s cubic-bezier(0.34, 1.56, 0.64, 1);
        transition-delay: calc(var(--i) * 0.035s);
    }
    .team-card:hover .social-bubble {
        transform: translateY(-3px);
    }

    .social-link {
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9999px;
        background: rgba(255, 255, 255, 0.16);
        backdrop-filter: blur(4px);
        color: #ffffff;
        font-size: 13.5px;
        line-height: 1;
        opacity: 0.95;
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.12);
        transition: transform .25s cubic-bezier(0.34, 1.56, 0.64, 1),
                    background-color .25s ease,
                    color .25s ease,
                    box-shadow .25s ease,
                    opacity .25s ease;
    }

    .social-link:hover {
        transform: translateY(-5px) scale(1.22);
        background: #ffffff !important;
        color: #047857 !important;
        opacity: 1 !important;
        border-color: #ffffff !important;
        box-shadow: 0 8px 16px -2px rgba(0, 0, 0, 0.35),
                    0 0 12px rgba(255, 255, 255, 0.6);
    }
</style>
@endpush
