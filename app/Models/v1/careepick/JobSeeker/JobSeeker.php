<?php

namespace App\Models\v1\careepick\JobSeeker;

use App\Models\ExperienceRange;
use Carbon\Carbon;
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
        'total_experience',
        'slug',
        'remarks',
    ];

    public function jobSeekerExperience()
    {
        return $this->hasMany(JobSeekerExperiences::class, 'job_seeker_id');
    }

    public function jobSeekerEducations()
    {
        return $this->hasMany(JobSeekerEducations::class, 'job_seeker_id');
    }

    public function jobSeekerSkills()
    {
        return $this->hasMany(JobSeekerSkills::class, 'job_seeker_id');
    }

    public static function calculateTotalExperience($jobSeekerId)
    {
        $jobSeeker = self::find($jobSeekerId);

        if ($jobSeeker) {
            $totalExperienceMonths = 0;

            foreach ($jobSeeker->jobSeekerExperience as $experience) {
                $startDate = Carbon::parse($experience->start_year . '-' . $experience->start_month . '-01');
                $endDate = $experience->currently_working ? Carbon::now() : Carbon::parse($experience->end_year . '-' . $experience->end_month . '-01');

                $totalExperienceMonths += $startDate->diffInMonths($endDate);
            }

            $totalExperienceYears = round($totalExperienceMonths / 12, 2);
            $jobSeeker->total_experience = $totalExperienceYears;
            $jobSeeker->save();

            return $totalExperienceYears;
        }

        return null;
    }

    public function getTotalExperienceYearsAttribute()
    {
        $totalExperienceMonths = 0;

        foreach ($this->jobSeekerExperience as $experience) {
            $startDate = Carbon::parse($experience->start_year . '-' . $experience->start_month . '-01');
            $endDate = $experience->currently_working ? Carbon::now() : Carbon::parse($experience->end_year . '-' . $experience->end_month . '-01');

            $totalExperienceMonths += $startDate->diffInMonths($endDate);
        }

        return round($totalExperienceMonths / 12, 2);
    }

    public function getExperienceRange()
    {
        $totalExperienceYears = $this->total_experience_years;
        $experienceRanges = ExperienceRange::all();

        foreach ($experienceRanges as $range) {
            if ($this->matchesRange($totalExperienceYears, $range->experience)) {
                return $range;
            }
        }

        return ExperienceRange::where('experience', 'N/A')->first(); // Default range if no match found
    }

    public function matchesRange($totalExperienceYears, $range)
    {
        if (preg_match('/(\d+) to (\d+) years/', $range, $matches)) {
            return $totalExperienceYears >= $matches[1] && $totalExperienceYears <= $matches[2];
        } elseif (preg_match('/At least (\d+) years/', $range, $matches)) {
            return $totalExperienceYears >= $matches[1];
        } elseif (preg_match('/At most (\d+) years/', $range, $matches)) {
            return $totalExperienceYears <= $matches[1];
        } elseif (preg_match('/(\d+)\+ years/', $range, $matches)) {
            return $totalExperienceYears >= $matches[1];
        } elseif ($range == 'N/A') {
            return true;
        }

        return false;
    }
}
