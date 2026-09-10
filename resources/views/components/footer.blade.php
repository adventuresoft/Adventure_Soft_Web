<!-- Enterprise Footer Section (White / Light Theme) -->
<footer class="bg-slate-50 border-t border-slate-200/80 pt-16 pb-12 relative overflow-hidden">
    <!-- Ambient Background Glow -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-emerald-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-cyan-500/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
            
            <!-- Column 1: Brand Info -->
            <div class="lg:col-span-2 space-y-6">
                <a href="{{ route('home') }}" class="flex items-center space-x-3.5 group">
                    <div class="h-11 w-11 rounded-[16px] bg-white border border-slate-200 shadow-md p-1 flex items-center justify-center overflow-hidden shrink-0">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Adventure Soft Icon" class="h-full w-full object-contain">
                    </div>
                    <div class="flex flex-col justify-center">
                        <img src="{{ asset('assets/images/adventure_soft_logo_text.png') }}" alt="Adventure Soft" class="h-3.5 sm:h-4 w-auto max-w-[175px] object-contain object-left">
                        <span class="text-[9.5px] font-semibold text-emerald-600 tracking-tight mt-0.5 block whitespace-nowrap">For Comfortable Life with Technology</span>
                    </div>
                </a>

                <p class="text-slate-600 text-sm leading-relaxed max-w-sm">
                    Engineering high-performance custom software, microservices, mobile applications, and AI platforms for global enterprise clients and industry leaders.
                </p>

                <!-- Global Office Address -->
                <div class="space-y-2 text-xs text-slate-600">
                    <p class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>J.S Tower- lift 5, Merul Badda, Dhaka-1212</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>advsoftbd@gmail.com</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>01612302124</span>
                    </p>
                </div>
            </div>

            <!-- Column 2: Solutions & Services -->
            <div class="space-y-4">
                <h4 class="font-outfit font-bold text-sm uppercase tracking-wider text-slate-900">Solutions & Services</h4>
                <ul class="space-y-2.5 text-sm text-slate-600">
                    <li><a href="{{ route('services') }}" class="hover:text-emerald-600 transition-colors">Enterprise Custom Software</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-emerald-600 transition-colors">Web App Engineering</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-emerald-600 transition-colors">Mobile App Development</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-emerald-600 transition-colors">Cloud & DevOps Architecture</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-emerald-600 transition-colors">AI & GenAI Integration</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-emerald-600 transition-colors">Dedicated Engineering Team</a></li>
                </ul>
            </div>

            <!-- Column 3: Quick Navigation -->
            <div class="space-y-4">
                <h4 class="font-outfit font-bold text-sm uppercase tracking-wider text-slate-900">Company</h4>
                <ul class="space-y-2.5 text-sm text-slate-600">
                    <li><a href="{{ route('about') }}" class="hover:text-emerald-600 transition-colors">About Adventure Soft</a></li>
                    <li><a href="{{ route('projects') }}" class="hover:text-emerald-600 transition-colors">Projects & Case Studies</a></li>
                    <li><a href="{{ route('technologies') }}" class="hover:text-emerald-600 transition-colors">Technologies & Stack</a></li>
                    <li><a href="{{ route('careers') }}" class="hover:text-emerald-600 transition-colors flex items-center space-x-2">
                        <span>Careers</span>
                        <span class="text-[10px] px-1.5 py-0.5 rounded bg-emerald-100 text-emerald-700 font-bold border border-emerald-200">HIRING</span>
                    </a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-emerald-600 transition-colors">Get a Free Quote</a></li>
                </ul>
            </div>

            <!-- Column 4: Newsletter & Trust Badges -->
            <div class="space-y-4">
                <h4 class="font-outfit font-bold text-sm uppercase tracking-wider text-slate-900">Stay Tech Informed</h4>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Subscribe for quarterly tech insights, architecture blueprints, and enterprise case studies.
                </p>
                <form action="#" method="POST" class="space-y-2" @submit.prevent="alert('Thank you for subscribing to Adventure Soft Insights!')">
                    <input type="email" placeholder="Enter business email" required
                           class="w-full px-4 py-2.5 rounded-xl bg-white border border-slate-300 text-slate-900 text-xs placeholder-slate-400 focus:outline-none focus:border-emerald-600">
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-md shadow-emerald-500/20 transition-all">
                        Subscribe Insights
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Copyright Bar -->
        <div class="pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 space-y-4 sm:space-y-0">
            <p>&copy; {{ date('Y') }} Adventure Soft Limited. All rights reserved.</p>
            <div class="flex items-center space-x-6">
                <a href="#" class="hover:text-slate-800">Privacy Policy</a>
                <a href="#" class="hover:text-slate-800">Terms of Service</a>
                <a href="#" class="hover:text-slate-800">Security Architecture</a>
            </div>
        </div>
    </div>
</footer>
