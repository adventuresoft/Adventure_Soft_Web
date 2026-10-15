<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    /** Supported social networks (key => label), in display order. */
    public const SOCIAL_NETWORKS = [
        'facebook'  => 'Facebook',
        'instagram' => 'Instagram',
        'linkedin'  => 'LinkedIn',
        'youtube'   => 'YouTube',
        'github'    => 'GitHub',
        'pinterest' => 'Pinterest',
        'twitter'   => 'Twitter / X',
    ];

    protected $fillable = [
        'name',
        'designation',
        'department',
        'photo',
        'bio',
        'social_links',
        'display_order',
        'status',
    ];

    protected $casts = [
        'social_links' => 'array',
        'status' => 'boolean',
    ];

    protected $appends = ['photo_url'];

    /**
     * Resolve a displayable URL for the photo.
     * - "teams/xyz.jpg"  → uploaded file on the private `uploads` disk (served via /media)
     * - "http(s)://..."  → external URL, used as-is
     */
    public function getPhotoUrlAttribute(): ?string
    {
        $photo = $this->photo;

        if (empty($photo)) {
            return null;
        }

        if (preg_match('#^https?://#i', $photo)) {
            return $photo;
        }

        if (Storage::disk('uploads')->exists($photo)) {
            [$folder, $file] = array_pad(explode('/', $photo, 2), 2, null);
            if ($folder && $file) {
                return route('media.show', ['folder' => $folder, 'filename' => $file]);
            }
        }

        return null;
    }

    /** True when the photo is a file we own on the uploads disk. */
    public function hasUploadedPhoto(): bool
    {
        return !empty($this->photo)
            && !preg_match('#^https?://#i', $this->photo)
            && Storage::disk('uploads')->exists($this->photo);
    }

    /** Remove the uploaded photo file (if any) from disk. */
    public function deleteUploadedPhoto(): void
    {
        if ($this->hasUploadedPhoto()) {
            Storage::disk('uploads')->delete($this->photo);
        }
    }

    /** Only the social links that have a value, in canonical order. */
    public function getActiveSocialLinksAttribute(): array
    {
        $links = $this->social_links ?? [];
        $active = [];

        foreach (array_keys(self::SOCIAL_NETWORKS) as $key) {
            if (!empty($links[$key])) {
                $active[$key] = $links[$key];
            }
        }

        return $active;
    }

    /** Initials fallback, e.g. "Tareq Jamil" → "TJ". */
    public function getInitialsAttribute(): string
    {
        $parts = preg_split('/\s+/', trim($this->name));
        $initials = mb_substr($parts[0] ?? '', 0, 1) . (count($parts) > 1 ? mb_substr(end($parts), 0, 1) : '');

        return mb_strtoupper($initials);
    }
}
