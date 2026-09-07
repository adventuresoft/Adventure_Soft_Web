<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'short_description',
        'long_description',
        'features',
        'display_order',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];
}
