<?php

namespace App\Models\v1\careepick\JobSeeker;

use App\Models\Jobs;
use App\Models\JobRequiredSkills;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\v1\careepick\Recruiter\Company;
use App\Models\v1\careepick\JobApplicationStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppliedJobs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'js_id',
        'company_id',
        'job_application_status',
    ];

    public function jobInfo()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class, 'js_id');
    }

    public function jobProvider()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function jobApplicationStatus()
    {
        return $this->belongsTo(JobApplicationStatus::class, 'job_application_status');
    }

    public static function getJobApplicationsForEmployer($employeerId, $jobSlug = null)
    {
        $processedData = [];
        $query =  self::with(['jobInfo', 'jobSeeker', 'jobProvider', 'jobApplicationStatus'])
                    ->where('company_id', $employeerId);
        if ($jobSlug != null) {
            $query->whereHas('jobInfo', function ($q) use ($jobSlug) {
                $q->where('slug', $jobSlug);
            });
        }

        $query->chunk(100, function ($jobs) use (&$processedData) {
            foreach ($jobs as $job) {
                // Retrieve job seeker skills
                $jobSeekerSkills = JobSeekerSkills::where('job_seeker_id', $job->js_id)
                    ->pluck('skill_id')
                    ->toArray();

                // Retrieve required skills for the job
                $requiredSkills = JobRequiredSkills::where('job_id', $job->job_id)
                    ->pluck('skill_id')
                    ->toArray();

                // Calculate profile matched percentage
                $matchedSkills = array_intersect($jobSeekerSkills, $requiredSkills);
                $profileMatchPercentage = count($matchedSkills) / count($requiredSkills) * 100;

                // $processedData[] = (object) [$job];
                $processedData[] = (object) [
                    'id' => $job->id,
                    'job_id' => $job->job_id,
                    'job_title' => $job->jobInfo->job_title,
                    'job_slug' => $job->jobInfo->slug,
                    'applicant_name' => $job->jobSeeker->jobseeker_name,
                    'applicant_id' => $job->jobSeeker->id,
                    'deadline' => $job->jobInfo->deadline,
                    'application_status_id' => $job->job_application_status,
                    'application_status' => optional($job->jobApplicationStatus)->status,
                    'profile_match_percentage' => $profileMatchPercentage,
                ];
            }
        });

        return new Collection($processedData);
    }

    public static function getJobApplicationsForEmployee($employeeId)
    {
        $processedData = [];

        self::with(['jobInfo', 'jobSeeker', 'jobProvider', 'jobApplicationStatus'])
            ->where('js_id', $employeeId)
            ->chunk(100, function ($jobs) use (&$processedData) {
                foreach ($jobs as $job) {
                    // $processedData[] = (object) [$job];
                    $processedData[] = (object) [
                        'id' => $job->id,
                        'job_title' => $job->jobInfo->job_title,
                        'company_name' => $job->jobProvider->company_name,
                        'company_id' => $job->jobProvider->id,
                        'deadline' => $job->jobInfo->deadline,
                        'date_applied' => $job->created_at,
                        'application_status_id' => $job->job_application_status,
                        'application_status' => optional($job->jobApplicationStatus)->status,
                    ];
                }
            });

            return new Collection($processedData);
    }
}
