<?php

namespace App\Models\v1\careepick\JobSeeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerCertifications extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_seeker_id',
        'certification_name',
        'certification_institution',
        'certification_score',
        'certified_month',
        'certified_year',
        'certification_expiry_date',
        'slug',
        'remarks',
    ];
}
