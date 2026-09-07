@extends('layouts.app')

@section('title', 'Portfolio & Case Studies — Adventure Soft')

@section('content')

<!-- Header Banner -->
<section class="py-20 bg-[#060911] border-b border-gray-800 relative">
    <div class="max-w-7xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20">Selected Engineering Works</span>
        <h1 class="font-outfit font-extrabold text-2xl sm:text-4xl text-white tracking-tight">Portfolio & Case Studies</h1>
        <p class="text-gray-400 text-sm max-w-2xl mx-auto">Explore our high-impact enterprise software deployments across FinTech, Healthcare, Logistics, and AI.</p>
    </div>
</section>

<!-- Portfolio Gallery Grid -->
<section x-data="{ selectedCategory: 'all' }" class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Category Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-3">
            <button @click="selectedCategory = 'all'" :class="selectedCategory === 'all' ? 'bg-emerald-500 text-white font-semibold' : 'glass-card text-gray-400'" class="px-5 py-2.5 rounded-full text-xs font-medium transition-all">All Case Studies</button>
            @foreach($categories as $category)
                <button @click="selectedCategory = '{{ $category }}'" :class="selectedCategory === '{{ $category }}' ? 'bg-emerald-500 text-white font-semibold' : 'glass-card text-gray-400'" class="px-5 py-2.5 rounded-full text-xs font-medium transition-all">{{ $category }}</button>
            @endforeach
        </div>

        <!-- Portfolios Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolios as $portfolio)
                <div x-show="selectedCategory === 'all' || selectedCategory === '{{ $portfolio->category }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="glass-card rounded-3xl p-8 space-y-6 border border-gray-800 hover:border-emerald-500/40 transition-all flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-xs px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-300 border border-cyan-500/20 font-semibold">{{ $portfolio->category }}</span>
                            <span class="text-xs text-gray-500 font-mono">{{ $portfolio->client_name }}</span>
                        </div>

                        <h2 class="font-outfit font-bold text-2xl text-white">{{ $portfolio->title }}</h2>
                        
                        <div class="space-y-2">
                            <span class="text-xs font-semibold text-gray-300 uppercase tracking-wider block">The Challenge</span>
                            <p class="text-gray-400 text-xs leading-relaxed">{{ $portfolio->challenge }}</p>
                        </div>

                        <div class="space-y-2">
                            <span class="text-xs font-semibold text-emerald-400 uppercase tracking-wider block">The Solution</span>
                            <p class="text-gray-300 text-xs leading-relaxed">{{ $portfolio->solution }}</p>
                        </div>

                        @if(!empty($portfolio->impact_metrics))
                            <div class="p-4 rounded-2xl bg-gray-900/90 border border-gray-800 grid grid-cols-2 gap-2">
                                @foreach($portfolio->impact_metrics as $metricLabel => $metricVal)
                                    <div>
                                        <span class="block font-outfit font-extrabold text-sm text-emerald-400">{{ $metricVal }}</span>
                                        <span class="block text-[10px] text-gray-400 uppercase tracking-wider">{{ $metricLabel }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="pt-4 border-t border-gray-800 flex items-center justify-between">
                        <span class="text-xs text-gray-500">Tech: {{ implode(', ', array_slice($portfolio->tech_stack ?? [], 0, 3)) }}</span>
                        <a href="{{ route('contact') }}?project={{ urlencode($portfolio->title) }}" class="text-xs font-semibold text-emerald-400 hover:text-emerald-300">Inquire Similar Project &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
