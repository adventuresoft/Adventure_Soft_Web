<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'category',
        'thumbnail',
        'gallery_images',
        'challenge',
        'solution',
        'impact_metrics',
        'tech_stack',
        'project_url',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'impact_metrics' => 'array',
        'tech_stack' => 'array',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    protected $appends = ['thumbnail_url'];

    /**
     * Resolve a displayable URL for the thumbnail.
     * - "projects/xyz.jpg" -> uploaded file on the private `uploads` disk (served via /media)
     * - "http(s)://..."    -> external URL, used as-is
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        $thumbnail = $this->thumbnail;

        if (empty($thumbnail)) {
            return null;
        }

        if (preg_match('#^https?://#i', $thumbnail)) {
            return $thumbnail;
        }

        if (Storage::disk('uploads')->exists($thumbnail)) {
            [$folder, $file] = array_pad(explode('/', $thumbnail, 2), 2, null);
            if ($folder && $file) {
                return route('media.show', ['folder' => $folder, 'filename' => $file]);
            }
        }

        return null;
    }

    /** True when the thumbnail is a file we own on the uploads disk. */
    public function hasUploadedThumbnail(): bool
    {
        return !empty($this->thumbnail)
            && !preg_match('#^https?://#i', $this->thumbnail)
            && Storage::disk('uploads')->exists($this->thumbnail);
    }

    /** Remove the uploaded thumbnail file (if any) from disk. */
    public function deleteUploadedThumbnail(): void
    {
        if ($this->hasUploadedThumbnail()) {
            Storage::disk('uploads')->delete($this->thumbnail);
        }
    }
}
