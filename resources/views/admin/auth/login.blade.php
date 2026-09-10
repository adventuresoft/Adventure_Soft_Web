<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Administration Login — Adventure Soft</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: { dark: '#090D16', emerald: '#10B981', cyan: '#0284C7' }
                    },
                    fontFamily: { sans: ['Inter', 'sans-serif'], outfit: ['Outfit', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        body { background: radial-gradient(circle at top right, #059669 0%, #090D16 40%); background-color: #090D16; color: #F9FAFB; }
        .glass-card { background: rgba(17, 24, 39, 0.75); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Top Navigation -->
        <div class="mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-emerald-400 hover:text-emerald-300 transition-colors px-3 py-1.5 rounded-full glass-card border border-emerald-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>&larr; Back to Website Homepage</span>
            </a>
        </div>

        <!-- Logo & Header -->
        <div class="text-center mb-8 space-y-3">
            <div class="h-16 w-16 rounded-[22px] bg-white p-2.5 shadow-2xl mx-auto flex items-center justify-center overflow-hidden">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Adventure Soft Icon" class="h-full w-full object-contain">
            </div>
            <div>
                <img src="{{ asset('assets/images/adventure_soft_logo_text_white.png') }}" alt="Adventure Soft" class="h-5 sm:h-6 w-auto mx-auto object-contain">
                <p class="text-[10px] sm:text-[11px] font-semibold text-emerald-400 tracking-tight mt-1.5">For Comfortable Life with Technology</p>
            </div>
        </div>

        <!-- Glassmorphic Login Card -->
        <div class="glass-card rounded-2xl p-8 shadow-2xl">
            @if(session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">Administrator Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 rounded-xl bg-gray-900/80 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all text-sm"
                           placeholder="admin@adventuresoft.com">
                    @error('email')
                        <span class="text-xs text-red-400 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-gray-300 mb-2">System Key / Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-3 rounded-xl bg-gray-900/80 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all text-sm"
                           placeholder="••••••••••••">
                    @error('password')
                        <span class="text-xs text-red-400 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2 text-gray-400 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-gray-700 bg-gray-900 text-emerald-500 focus:ring-emerald-500">
                        <span>Remember Session</span>
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-emerald-500 to-cyan-600 hover:from-emerald-400 hover:to-cyan-500 text-white font-semibold text-sm shadow-lg shadow-emerald-500/25 transition-all transform active:scale-95">
                    Authenticate & Access Dashboard
                </button>
            </form>
        </div>

        <div class="mt-6 text-center space-y-3">
            <p class="text-xs text-gray-500">
                🔒 Protected System Administration Console. Authorized personnel only.
            </p>

            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center space-x-2 text-xs font-semibold text-emerald-400 hover:text-emerald-300 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span>Back to Website Homepage</span>
                </a>
            </div>
        </div>
    </div>

</body>
</html>
