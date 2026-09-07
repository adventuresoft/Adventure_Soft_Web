<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
