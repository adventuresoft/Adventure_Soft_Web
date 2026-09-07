<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

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
}
