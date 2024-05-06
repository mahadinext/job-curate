<?php

namespace App\Models\v1\careepick\JobSeeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'jobseeker_name',
        'jobseeker_mail',
        'jobseeker_password',
        'jobseeker_dob',
        'jobseeker_religion',
        'jobseeker_marital_status',
        'jobseeker_nid_no',
        'jobseeker_gender',
        // 'jobseeker_gender_id',
        'jobseeker_address',
        'jobseeker_image',
        'jobseeker_custom_resume',
        'jobseeker_career_summary',
        'jobseeker_website_url',
        'jobseeker_linkedin_url',
        'jobseeker_facebook_url',
        'jobseeker_phone_no_1',
        'jobseeker_phone_no_2',
        'jobseeker_status',
        'slug',
        'remarks',
    ];
}
