<?php

namespace App\Models\v1\careepick\JobSeeker;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerResearchPapers extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_seeker_id',
        'research_paper_subject',
        'research_paper_summary',
        'research_paper_url',
        'slug',
        'remarks',
    ];
}
