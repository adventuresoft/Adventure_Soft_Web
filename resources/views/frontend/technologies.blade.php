@extends('layouts.app')

@section('title', 'Technologies & Tech Stack Ecosystem — Adventure Soft')

@section('content')

@php
    $techLogos = [
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

    $categoryLabels = [
        'backend' => 'Backend & API Engineering',
        'frontend' => 'Frontend & Web Engineering',
        'mobile' => 'Mobile Application Engineering',
        'database' => 'Database & Storage Architecture',
        'devops' => 'Cloud & DevOps Infrastructure',
        'ai_ml' => 'Artificial Intelligence & Machine Learning',
    ];

    $categoryBadges = [
        'backend' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        'frontend' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
        'mobile' => 'bg-teal-50 text-teal-700 border-teal-200',
        'database' => 'bg-blue-50 text-blue-700 border-blue-200',
        'devops' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
        'ai_ml' => 'bg-purple-50 text-purple-700 border-purple-200',
    ];
@endphp

<!-- Header Banner (WHITE THEME) -->
<section class="py-20 bg-slate-50 border-b border-slate-200 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:20px_20px] opacity-70 pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 text-center space-y-4 relative z-10">
        <span class="text-xs font-bold uppercase tracking-widest text-cyan-700 px-3.5 py-1.5 rounded-full bg-cyan-100/80 border border-cyan-200 shadow-xs inline-flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-cyan-600 animate-pulse"></span>
            Technical Stack Blueprint
        </span>
        <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-slate-900 tracking-tight">Our Technology Ecosystem</h1>
        <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto font-normal leading-relaxed">
            We leverage battle-tested open-source frameworks, high-throughput backend runtimes, distributed databases, and resilient cloud architectures.
        </p>
    </div>
</section>

<!-- Technologies Matrix Breakdown -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        @foreach($technologies as $category => $techList)
            <div class="space-y-8">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-200 pb-5">
                    <h2 class="font-outfit font-bold text-lg sm:text-xl text-slate-900 uppercase tracking-wide flex items-center space-x-3">
                        <span class="w-3.5 h-3.5 rounded-full bg-gradient-to-r from-emerald-600 to-teal-500 shadow-xs"></span>
                        <span>{{ $categoryLabels[$category] ?? strtoupper(str_replace('_', ' ', $category)) . ' ENGINEERING' }}</span>
                    </h2>
                    <span class="text-xs font-semibold px-3 py-1 rounded-full border {{ $categoryBadges[$category] ?? 'bg-slate-100 text-slate-700 border-slate-200' }} w-fit">
                        4 Core Technologies
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($techList as $tech)
                        @php
                            $logoUrl = $techLogos[$tech->icon] ?? 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/devicon/devicon-original.svg';
                        @endphp
                        <div class="bg-white p-6 rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:shadow-emerald-600/10 hover:border-emerald-400 transition-all duration-300 space-y-4 group relative overflow-hidden flex flex-col justify-between hover:-translate-y-1">
                            <!-- Top Accent Line -->
                            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <div class="space-y-4">
                                <div class="w-14 h-14 rounded-2xl bg-slate-50 border border-slate-200 p-3 flex items-center justify-center group-hover:scale-110 group-hover:bg-white group-hover:border-emerald-200 transition-all shadow-xs">
                                    <img src="{{ $logoUrl }}" alt="{{ $tech->name }} Logo" class="h-full w-full object-contain filter drop-shadow">
                                </div>
                                <div>
                                    <h3 class="font-outfit font-bold text-lg text-slate-900 group-hover:text-emerald-700 transition-colors">{{ $tech->name }}</h3>
                                    <p class="text-slate-600 text-xs mt-2 leading-relaxed">
                                        {{ $tech->description ?? 'Enterprise implementation for mission-critical high-load production systems.' }}
                                    </p>
                                </div>
                            </div>

                            <div class="pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400 group-hover:text-emerald-600 transition-colors">
                                <span class="font-medium">Enterprise Grade</span>
                                <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection
