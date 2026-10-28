<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Streams admin-uploaded media stored outside the public folder
 * (storage/app/uploads) with long-lived browser caching.
 */
class MediaController extends Controller
{
    /** Only these top-level folders may be served publicly. */
    protected array $allowedFolders = ['teams', 'projects'];

    public function show(string $folder, string $filename): BinaryFileResponse
    {
        abort_unless(in_array($folder, $this->allowedFolders, true), 404);

        // Block path traversal — filename must be a plain file name.
        abort_if($filename !== basename($filename) || str_starts_with($filename, '.'), 404);

        $disk = Storage::disk('uploads');
        $path = $folder . '/' . $filename;

        abort_unless($disk->exists($path), 404);

        $mime = $disk->mimeType($path) ?: 'application/octet-stream';
        abort_unless(str_starts_with($mime, 'image/'), 404);

        return response()->file($disk->path($path), [
            'Content-Type' => $mime,
            'Cache-Control' => 'public, max-age=31536000, immutable',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
