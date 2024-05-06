<?php

namespace App\Models\v1\careepick\Recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_bn_name',
        'company_year_of_establishment',
        'company_logo',
        'company_slogan',
        'company_bn_slogan',
        'company_mail',
        'company_password',
        'company_description',
        'company_country',
        'company_district',
        'company_upazila',
        'company_address_1',
        'company_address_2',
        'company_address_3',
        'company_google_map_address',
        'company_phone_no_1',
        'company_phone_no_2',
        'company_phone_no_3',
        'company_website_url',
        'company_linkedin_url',
        'company_facebook_url',
        'company_glassdoor_url',
        'company_size',
        'working_hour',
        'company_tin_no',
        'company_bin_no',
        'company_trade_license_no',
        'company_trade_license_document',
        'company_status',
        'terms_and_condition_agreement',
        'privacy_and_policy_agreement',
        'slug',
        'remarks',
    ];
}
