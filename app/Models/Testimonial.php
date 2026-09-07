<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'designation',
        'company',
        'avatar',
        'rating',
        'comment',
        'video_url',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
