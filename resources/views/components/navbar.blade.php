<!-- Aesthetic Floating Glassmorphic Navbar (White Theme) -->
<header x-data="{ openMobileMenu: false, scrolled: false, activeDropdown: null }" 
        @scroll.window="scrolled = (window.pageYOffset > 20)"
        :class="scrolled ? 'py-2 bg-white/95 backdrop-blur-2xl border-b border-slate-200 shadow-md shadow-slate-200/40' : 'py-2.5 bg-white/90 backdrop-blur-md border-b border-slate-200/70'"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            
            <!-- Brand Logo & Name -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group py-0.5 shrink-0">
                <div class="h-9 w-9 rounded-[12px] bg-white border border-slate-200 shadow-xs p-1 flex items-center justify-center overflow-hidden shrink-0 group-hover:scale-105 transition-transform">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Adventure Soft Icon" class="h-full w-full object-contain">
                </div>
                <div class="flex flex-col justify-center">
                    <img src="{{ asset('assets/images/adventure_soft_logo_text.png') }}" alt="Adventure Soft" class="h-3 sm:h-3.5 w-auto max-w-[155px] sm:max-w-[165px] object-contain object-left">
                    <span class="text-[8.5px] font-semibold text-emerald-600 tracking-tight mt-0.5 block whitespace-nowrap">For Comfortable Life with Technology</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2">
                
                <!-- Home Link -->
                <a href="{{ route('home') }}" class="relative px-3.5 py-2.5 text-xs whitespace-nowrap transition-colors group/nav {{ request()->routeIs('home') ? 'text-emerald-700 font-bold' : 'text-slate-700 hover:text-emerald-600 font-semibold' }}">
                    <span>Home</span>
                    @if(request()->routeIs('home'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-gradient-to-r from-emerald-600 to-teal-500"></span>
                    @else
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-emerald-500 scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-200 origin-center"></span>
                    @endif
                </a>

                <!-- Services Dropdown -->
                <div class="relative" @mouseenter="activeDropdown = 'services'" @mouseleave="activeDropdown = null">
                    <a href="{{ route('services') }}" class="relative px-3.5 py-2.5 text-xs flex items-center space-x-1 whitespace-nowrap transition-colors group/nav {{ request()->routeIs('services*') ? 'text-emerald-700 font-bold' : 'text-slate-700 hover:text-emerald-600 font-semibold' }}">
                        <span>Services</span>
                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover/nav:text-emerald-600 transition-transform" :class="activeDropdown === 'services' ? 'rotate-180 text-emerald-600' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        @if(request()->routeIs('services*'))
                            <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-gradient-to-r from-emerald-600 to-teal-500"></span>
                        @else
                            <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-emerald-500 scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-200 origin-center"></span>
                        @endif
                    </a>

                    <!-- Mega Dropdown Panel -->
                    <div x-show="activeDropdown === 'services'" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                         class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-[600px] p-4 rounded-2xl bg-white border border-slate-200/90 shadow-2xl shadow-slate-900/20 z-50"
                         style="display: none; background-color: #ffffff;">
                        
                        <div class="grid grid-cols-2 gap-2.5">
                            <a href="{{ route('services.show', 'enterprise-custom-software') }}" class="p-3 rounded-xl bg-white hover:bg-emerald-50/70 border border-slate-100 hover:border-emerald-200 transition-all flex items-start space-x-3 group">
                                <div class="p-2.5 rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-100 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-900 group-hover:text-emerald-700 transition-colors">Enterprise Custom Software</span>
                                    <span class="block text-[11px] text-slate-500 mt-0.5">High-throughput microservices</span>
                                </div>
                            </a>

                            <a href="{{ route('services.show', 'web-application-engineering') }}" class="p-3 rounded-xl bg-white hover:bg-cyan-50/70 border border-slate-100 hover:border-cyan-200 transition-all flex items-start space-x-3 group">
                                <div class="p-2.5 rounded-xl bg-cyan-50 text-cyan-600 border border-cyan-100 group-hover:scale-110 group-hover:bg-cyan-600 group-hover:text-white transition-all shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-900 group-hover:text-cyan-700 transition-colors">Web App Engineering</span>
                                    <span class="block text-[11px] text-slate-500 mt-0.5">Sub-second PWA & SSR systems</span>
                                </div>
                            </a>

                            <a href="{{ route('services.show', 'mobile-app-development') }}" class="p-3 rounded-xl bg-white hover:bg-purple-50/70 border border-slate-100 hover:border-purple-200 transition-all flex items-start space-x-3 group">
                                <div class="p-2.5 rounded-xl bg-purple-50 text-purple-600 border border-purple-100 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-900 group-hover:text-purple-700 transition-colors">Mobile App Development</span>
                                    <span class="block text-[11px] text-slate-500 mt-0.5">Native iOS, Android & Flutter</span>
                                </div>
                            </a>

                            <a href="{{ route('services.show', 'cloud-infrastructure-devops') }}" class="p-3 rounded-xl bg-white hover:bg-amber-50/70 border border-slate-100 hover:border-amber-200 transition-all flex items-start space-x-3 group">
                                <div class="p-2.5 rounded-xl bg-amber-50 text-amber-600 border border-amber-100 group-hover:scale-110 group-hover:bg-amber-600 group-hover:text-white transition-all shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 001-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-900 group-hover:text-amber-700 transition-colors">Cloud & DevOps</span>
                                    <span class="block text-[11px] text-slate-500 mt-0.5">Kubernetes & Multi-Cloud</span>
                                </div>
                            </a>

                            <a href="{{ route('services.show', 'ai-machine-learning-solutions') }}" class="p-3 rounded-xl bg-white hover:bg-emerald-50/70 border border-slate-100 hover:border-emerald-200 transition-all flex items-start space-x-3 group">
                                <div class="p-2.5 rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-100 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-900 group-hover:text-emerald-700 transition-colors">AI & Machine Learning</span>
                                    <span class="block text-[11px] text-slate-500 mt-0.5">Custom LLMs & GenAI platforms</span>
                                </div>
                            </a>

                            <a href="{{ route('services.show', 'dedicated-developers-team-augmentation') }}" class="p-3 rounded-xl bg-white hover:bg-cyan-50/70 border border-slate-100 hover:border-cyan-200 transition-all flex items-start space-x-3 group">
                                <div class="p-2.5 rounded-xl bg-cyan-50 text-cyan-600 border border-cyan-100 group-hover:scale-110 group-hover:bg-cyan-600 group-hover:text-white transition-all shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-900 group-hover:text-cyan-700 transition-colors">Dedicated Developers</span>
                                    <span class="block text-[11px] text-slate-500 mt-0.5">Offshore tech team augmentation</span>
                                </div>
                            </a>
                        </div>

                        <!-- Mega Dropdown Footer -->
                        <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between px-2 text-xs">
                            <span class="text-slate-500 font-medium">Need custom enterprise architecture?</span>
                            <a href="{{ route('services') }}" class="font-bold text-emerald-600 hover:text-emerald-700 flex items-center space-x-1">
                                <span>Explore All Services</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Projects Link -->
                <a href="{{ route('projects') }}" class="relative px-3.5 py-2.5 text-xs whitespace-nowrap transition-colors group/nav {{ (request()->routeIs('projects*') || request()->routeIs('portfolio*')) ? 'text-emerald-700 font-bold' : 'text-slate-700 hover:text-emerald-600 font-semibold' }}">
                    <span>Projects</span>
                    @if(request()->routeIs('projects*') || request()->routeIs('portfolio*'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-gradient-to-r from-emerald-600 to-teal-500"></span>
                    @else
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-emerald-500 scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-200 origin-center"></span>
                    @endif
                </a>

                <!-- Technologies Link -->
                <a href="{{ route('technologies') }}" class="relative px-3.5 py-2.5 text-xs whitespace-nowrap transition-colors group/nav {{ request()->routeIs('technologies*') ? 'text-emerald-700 font-bold' : 'text-slate-700 hover:text-emerald-600 font-semibold' }}">
                    <span>Technologies</span>
                    @if(request()->routeIs('technologies*'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-gradient-to-r from-emerald-600 to-teal-500"></span>
                    @else
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-emerald-500 scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-200 origin-center"></span>
                    @endif
                </a>

                <!-- About Us Link -->
                <a href="{{ route('about') }}" class="relative px-3.5 py-2.5 text-xs whitespace-nowrap transition-colors group/nav {{ request()->routeIs('about*') ? 'text-emerald-700 font-bold' : 'text-slate-700 hover:text-emerald-600 font-semibold' }}">
                    <span>About Us</span>
                    @if(request()->routeIs('about*'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-gradient-to-r from-emerald-600 to-teal-500"></span>
                    @else
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-emerald-500 scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-200 origin-center"></span>
                    @endif
                </a>

                <!-- Careers Link -->
                <a href="{{ route('careers') }}" class="relative px-3.5 py-2.5 text-xs whitespace-nowrap transition-colors flex items-center space-x-1.5 group/nav {{ request()->routeIs('careers*') ? 'text-emerald-700 font-bold' : 'text-slate-700 hover:text-emerald-600 font-semibold' }}">
                    <span>Careers</span>
                    <span class="px-1.5 py-0.5 text-[9px] font-bold rounded-full bg-emerald-100 text-emerald-700 border border-emerald-200">Hiring</span>
                    @if(request()->routeIs('careers*'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-gradient-to-r from-emerald-600 to-teal-500"></span>
                    @else
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-emerald-500 scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-200 origin-center"></span>
                    @endif
                </a>

                <!-- Contact Us Link -->
                <a href="{{ route('contact') }}" class="relative px-3.5 py-2.5 text-xs whitespace-nowrap transition-colors group/nav {{ request()->routeIs('contact*') ? 'text-emerald-700 font-bold' : 'text-slate-700 hover:text-emerald-600 font-semibold' }}">
                    <span>Contact</span>
                    @if(request()->routeIs('contact*'))
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-gradient-to-r from-emerald-600 to-teal-500"></span>
                    @else
                        <span class="absolute bottom-0 left-2 right-2 h-[2.5px] rounded-full bg-emerald-500 scale-x-0 group-hover/nav:scale-x-100 transition-transform duration-200 origin-center"></span>
                    @endif
                </a>
            </nav>

            <!-- Primary Action CTA Button (Simple & Clean) -->
            <div class="hidden lg:flex items-center shrink-0">
                <a href="{{ route('contact') }}" class="px-6 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs transition-colors flex items-center space-x-2 shadow-sm whitespace-nowrap">
                    <span>Get a Free Quote</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <div class="lg:hidden flex items-center">
                <button @click="openMobileMenu = !openMobileMenu" class="p-2 rounded-xl text-slate-700 hover:text-slate-900 hover:bg-slate-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!openMobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="openMobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Navigation -->
        <div x-show="openMobileMenu" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden mt-4 p-6 rounded-2xl bg-white border border-slate-200 shadow-2xl space-y-3"
             style="display: none;">
            <a href="{{ route('home') }}" class="block text-sm py-1.5 transition-colors {{ request()->routeIs('home') ? 'text-emerald-700 font-bold border-b-2 border-emerald-600 w-fit' : 'text-slate-800 hover:text-emerald-600 font-semibold' }}">Home</a>
            <a href="{{ route('services') }}" class="block text-sm py-1.5 transition-colors {{ request()->routeIs('services*') ? 'text-emerald-700 font-bold border-b-2 border-emerald-600 w-fit' : 'text-slate-800 hover:text-emerald-600 font-semibold' }}">Services</a>
            <a href="{{ route('projects') }}" class="block text-sm py-1.5 transition-colors {{ (request()->routeIs('projects*') || request()->routeIs('portfolio*')) ? 'text-emerald-700 font-bold border-b-2 border-emerald-600 w-fit' : 'text-slate-800 hover:text-emerald-600 font-semibold' }}">Projects</a>
            <a href="{{ route('technologies') }}" class="block text-sm py-1.5 transition-colors {{ request()->routeIs('technologies*') ? 'text-emerald-700 font-bold border-b-2 border-emerald-600 w-fit' : 'text-slate-800 hover:text-emerald-600 font-semibold' }}">Technologies</a>
            <a href="{{ route('about') }}" class="block text-sm py-1.5 transition-colors {{ request()->routeIs('about*') ? 'text-emerald-700 font-bold border-b-2 border-emerald-600 w-fit' : 'text-slate-800 hover:text-emerald-600 font-semibold' }}">About Us</a>
            <a href="{{ route('careers') }}" class="block text-sm py-1.5 transition-colors {{ request()->routeIs('careers*') ? 'text-emerald-700 font-bold border-b-2 border-emerald-600 w-fit' : 'text-slate-800 hover:text-emerald-600 font-semibold' }}">
                <span>Careers</span>
                <span class="ml-1.5 px-1.5 py-0.5 text-[9px] font-bold rounded-full bg-emerald-100 text-emerald-700 border border-emerald-200">Hiring</span>
            </a>
            <a href="{{ route('contact') }}" class="block text-sm py-1.5 transition-colors {{ request()->routeIs('contact*') ? 'text-emerald-700 font-bold border-b-2 border-emerald-600 w-fit' : 'text-slate-800 hover:text-emerald-600 font-semibold' }}">Contact Us</a>
            <div class="pt-4 border-t border-slate-200">
                <a href="{{ route('contact') }}" class="block w-full text-center py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs transition-colors shadow-sm">
                    Get a Free Quote
                </a>
            </div>
        </div>

    </div>
</header>
