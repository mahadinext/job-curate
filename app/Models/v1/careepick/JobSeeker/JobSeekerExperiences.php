<?php

namespace App\Models\v1\careepick\JobSeeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerExperiences extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_seeker_id',
        'organization_name',
        'designation',
        'responsibilities',
        'start_date',
        'start_month',
        'start_year',
        'end_date',
        'end_month',
        'end_year',
        'currently_working',
        'slug',
        'remarks',
    ];
}
