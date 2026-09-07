<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'job_type',
        'experience_level',
        'location',
        'salary_range',
        'description',
        'requirements',
        'deadline',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
        'status' => 'boolean',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class, 'job_id');
    }
}
