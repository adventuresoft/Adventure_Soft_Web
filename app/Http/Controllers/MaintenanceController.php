<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceController extends Controller
{
    /**
     * Verify the secret key from path parameter or query string.
     */
    protected function authorizeKey(Request $request, ?string $key = null): void
    {
        $configuredKey = config('app.maintenance_key', env('MAINTENANCE_KEY', 'adventuresoft_secure_maint_2026'));
        $providedKey = $key ?? $request->query('key');

        if (empty($providedKey) || !hash_equals((string) $configuredKey, (string) $providedKey)) {
            abort(403, 'Unauthorized: Invalid or missing maintenance secret key.');
        }
    }

    /**
     * Clear all application caches (optimize, route, config, cache, views).
     */
    public function clearCache(Request $request, ?string $key = null): Response
    {
        $this->authorizeKey($request, $key);

        $outputs = [];

        Artisan::call('optimize:clear');
        $outputs[] = trim(Artisan::output());

        Artisan::call('cache:clear');
        $outputCache = trim(Artisan::output());
        if ($outputCache) $outputs[] = $outputCache;

        Artisan::call('config:clear');
        $outputConfig = trim(Artisan::output());
        if ($outputConfig) $outputs[] = $outputConfig;

        Artisan::call('route:clear');
        $outputRoute = trim(Artisan::output());
        if ($outputRoute) $outputs[] = $outputRoute;

        Artisan::call('view:clear');
        $outputView = trim(Artisan::output());
        if ($outputView) $outputs[] = $outputView;

        $log = implode("\n\n", array_filter($outputs));

        return $this->renderHtmlResponse(
            title: 'System Cache Cleared Successfully',
            subtitle: 'Optimized config, routes, views, and application caches have been cleared.',
            output: $log,
            statusColor: 'emerald'
        );
    }

    /**
     * Run database migrations safely (--force enabled for production).
     */
    public function migrate(Request $request, ?string $key = null): Response
    {
        $this->authorizeKey($request, $key);

        try {
            Artisan::call('migrate', ['--force' => true]);
            $output = trim(Artisan::output()) ?: 'Database migration executed (no pending migrations).';

            return $this->renderHtmlResponse(
                title: 'Database Migrated Successfully',
                subtitle: 'All pending migrations have been executed against the database.',
                output: $output,
                statusColor: 'emerald'
            );
        } catch (\Throwable $e) {
            return $this->renderHtmlResponse(
                title: 'Migration Failed',
                subtitle: 'An error occurred while executing database migrations.',
                output: $e->getMessage() . "\n\n" . $e->getTraceAsString(),
                statusColor: 'red',
                statusCode: 500
            );
        }
    }

    /**
     * Check migration status.
     */
    public function migrateStatus(Request $request, ?string $key = null): Response
    {
        $this->authorizeKey($request, $key);

        Artisan::call('migrate:status');
        $output = trim(Artisan::output());

        return $this->renderHtmlResponse(
            title: 'Database Migration Status',
            subtitle: 'Overview of all migration batches and execution states.',
            output: $output,
            statusColor: 'cyan'
        );
    }

    /**
     * Helper to render a clean, luxury dark dashboard response.
     */
    protected function renderHtmlResponse(
        string $title,
        string $subtitle,
        string $output,
        string $statusColor = 'emerald',
        int $statusCode = 200
    ): Response {
        $colorHex = match ($statusColor) {
            'red' => '#ef4444',
            'cyan' => '#06b6d4',
            default => '#10b981',
        };

        $timestamp = now()->toDateTimeString() . ' (' . config('app.timezone') . ')';
        $env = app()->environment();
        $escapedOutput = htmlspecialchars($output, ENT_QUOTES, 'UTF-8');

        $html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title} — Adventure Soft System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0b0f19; }
        code, pre { font-family: 'JetBrains Mono', monospace; }
    </style>
</head>
<body class="min-h-screen text-slate-200 flex items-center justify-center p-4 sm:p-6">
    <div class="max-w-2xl w-full bg-slate-900/90 backdrop-blur-xl border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl space-y-6">
        
        <!-- Header badge -->
        <div class="flex items-center justify-between border-b border-slate-800 pb-5">
            <div class="flex items-center space-x-3">
                <div class="w-3.5 h-3.5 rounded-full" style="background-color: {$colorHex}; box-shadow: 0 0 14px {$colorHex};"></div>
                <span class="text-xs font-bold tracking-widest uppercase text-slate-400">Adventure Soft Maintenance</span>
            </div>
            <span class="text-xs px-2.5 py-1 rounded-full font-mono bg-slate-800 text-slate-300 border border-slate-700">ENV: {$env}</span>
        </div>

        <!-- Title & description -->
        <div class="space-y-1.5">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">{$title}</h1>
            <p class="text-xs sm:text-sm text-slate-400">{$subtitle}</p>
        </div>

        <!-- Terminal Output Window -->
        <div class="rounded-2xl bg-black/70 border border-slate-800 p-4 space-y-2">
            <div class="flex items-center justify-between text-[11px] text-slate-500 border-b border-slate-800/80 pb-2">
                <span class="font-mono">Console Output:</span>
                <span>{$timestamp}</span>
            </div>
            <pre class="text-xs text-emerald-400 whitespace-pre-wrap leading-relaxed overflow-x-auto max-h-96">{$escapedOutput}</pre>
        </div>

        <!-- Actions -->
        <div class="pt-2 flex flex-wrap items-center justify-between gap-3 text-xs">
            <a href="/" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold transition-colors">&larr; Go to Website</a>
            <a href="/admin" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition-colors">Go to Admin Portal &rarr;</a>
        </div>
    </div>
</body>
</html>
HTML;

        return response($html, $statusCode)->header('Content-Type', 'text/html');
    }
}
