<!DOCTYPE html>
<html lang="en" class="light scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Adventure Soft — Enterprise IT & Software Engineering')</title>
    <meta name="description" content="@yield('meta_description', 'Adventure Soft is a world-class enterprise software development company engineering custom web apps, mobile solutions, cloud microservices, and AI platforms.')">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            light: '#FFFFFF',
                            card: '#F8FAFC',
                            emerald: '#059669',
                            cyan: '#0891B2',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js & GSAP Animation Engine -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <style>
        html, body {
            background-color: #FFFFFF;
            color: #0F172A;
            overflow-x: hidden;
            overflow-y: auto;
            height: auto;
            min-height: 100vh;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(226, 232, 240, 0.9);
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.04), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
        }
        .glass-card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -15px rgba(5, 150, 105, 0.12), 0 0 15px rgba(8, 145, 178, 0.08);
            border-color: rgba(16, 185, 129, 0.4);
        }
        .text-gradient {
            background: linear-gradient(135deg, #059669 0%, #0891B2 50%, #2563EB 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .glow-emerald {
            box-shadow: 0 10px 35px -5px rgba(5, 150, 105, 0.25);
        }
        
        /* Ambient Background Keyframe Animations */
        @keyframes blob-float {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(40px, -60px) scale(1.1); }
            66% { transform: translate(-30px, 30px) scale(0.92); }
        }
        @keyframes bg-grid-move {
            0% { background-position: 0 0; }
            100% { background-position: 40px 40px; }
        }
        .animate-blob-1 {
            animation: blob-float 16s ease-in-out infinite alternate;
        }
        .animate-blob-2 {
            animation: blob-float 20s ease-in-out infinite alternate-reverse;
        }
        .animate-blob-3 {
            animation: blob-float 14s ease-in-out infinite alternate;
        }
        .bg-animated-grid {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(226, 232, 240, 0.5) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(226, 232, 240, 0.5) 1px, transparent 1px);
            animation: bg-grid-move 25s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 25s linear infinite;
        }
    </style>
</head>
<body class="font-sans antialiased selection:bg-emerald-500 selection:text-white min-h-screen flex flex-col bg-white text-slate-900 relative">

    <!-- Global Floating Aesthetic Background Animation Layer -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <!-- Animated Background Grid -->
        <div class="absolute inset-0 bg-animated-grid opacity-60"></div>

        <!-- Floating Gradient Orbs -->
        <div class="absolute -top-32 -left-32 w-[650px] h-[650px] bg-gradient-to-tr from-emerald-200/40 via-teal-100/30 to-emerald-300/20 rounded-full blur-[140px] animate-blob-1"></div>
        <div class="absolute top-1/3 -right-32 w-[600px] h-[600px] bg-gradient-to-br from-cyan-200/30 via-sky-100/40 to-blue-200/20 rounded-full blur-[140px] animate-blob-2"></div>
        <div class="absolute -bottom-32 left-1/3 w-[550px] h-[550px] bg-gradient-to-tr from-emerald-100/30 via-cyan-100/30 to-teal-200/30 rounded-full blur-[140px] animate-blob-3"></div>
    </div>

    <!-- Aesthetic Header Navbar -->
    @include('components.navbar')

    <!-- Main Content Area -->
    <main class="flex-1 {{ request()->routeIs('home') ? 'pt-0' : 'pt-20' }} bg-transparent relative z-10">
        @yield('content')
    </main>

    <!-- Enterprise Footer -->
    @include('components.footer')

    <!-- Global GSAP Animations Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // GSAP ScrollTrigger Register
            if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);

                // Global Reveal Animations
                gsap.utils.toArray('.reveal-up').forEach((elem) => {
                    gsap.fromTo(elem, 
                        { opacity: 0, y: 30 },
                        { 
                            opacity: 1, 
                            y: 0, 
                            duration: 0.8, 
                            ease: 'power2.out',
                            scrollTrigger: {
                                trigger: elem,
                                start: 'top 88%',
                                toggleActions: 'play none none reverse'
                            }
                        }
                    );
                });
            }
        });
    </script>
    @stack('scripts')

</body>
</html>
