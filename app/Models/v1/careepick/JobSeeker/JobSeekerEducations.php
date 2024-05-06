<?php

namespace App\Models\v1\careepick\JobSeeker;

use Illuminate\Database\Eloquent\Model;
use App\Models\v1\careepick\EducationLevels;
use App\Models\v1\careepick\EducationSubjects;
use App\Models\v1\careepick\EducationDegreeTitle;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobSeekerEducations extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_seeker_id',
        'education_level_id',
        'education_degree_title_id',
        'education_degree_title',
        'education_subjects_id',
        'education_board',
        'education_institute_type_id',
        'school_college_id',
        'university_id',
        'school_name',
        'college_name',
        'madrasha_name',
        'university_name',
        'education_result_type_id',
        'marks',
        'cgpa',
        'scale',
        'duration',
        'year_of_passing',
        'slug',
        'remarks',
    ];

    protected $table = 'job_seeker_educations';

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevels::class, 'education_level_id');
    }

    public function educationDegreeTitle()
    {
        return $this->belongsTo(EducationDegreeTitle::class, 'education_degree_title_id');
    }

    public function educationSubject()
    {
        return $this->belongsTo(EducationSubjects::class, 'education_subjects_id');
    }
}
