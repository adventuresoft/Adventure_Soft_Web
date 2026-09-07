<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'applicant_name',
        'email',
        'phone',
        'linkedin_url',
        'portfolio_url',
        'resume_path',
        'cover_letter',
        'status',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(JobPosting::class, 'job_id');
    }
}
