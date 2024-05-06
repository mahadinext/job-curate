<?php

namespace App\Models\v1\careepick\Recruiter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAssociatedIndustries extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'industry_id',
    ];
}
