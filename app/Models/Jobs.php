<?php

namespace App\Models;

use Exception;
use App\Models\SalaryType;
use Illuminate\Support\Collection;
use App\Models\v1\careepick\Skills;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Models\v1\careepick\JobCategory;
use App\Models\v1\careepick\Recruiter\Company;
use App\Models\v1\careepick\JobSeeker\SavedJobs;
use App\Models\v1\careepick\JobSeeker\AppliedJobs;
use App\Models\v1\careepick\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jobs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'job_category_id',
        'job_title',
        'vacancy',
        'salary_type_id',
        'salary',
        'age_id',
        'job_location',
        'experience_id',
        'published',
        'deadline',
        'education',
        'experience_requirments',
        'additional_requirments',
        'responsibilities',
        'compensation_benefits',
        'job_nature',
        'job_place',
        'job_highlights',
        'job_status',
        'slug',
        'remarks',
    ];

    /**
     * Get the jobs associated with the category.
     */
    public function jobSkills()
    {
        return $this->hasMany(JobRequiredSkills::class, 'job_id');
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function salaryType()
    {
        return $this->belongsTo(SalaryType::class, 'salary_type_id');
    }

    public function experienceRange()
    {
        return $this->belongsTo(ExperienceRange::class, 'experience_id');
    }

    public function ageRange()
    {
        return $this->belongsTo(AgeRange::class, 'age_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function jobNature()
    {
        return $this->belongsTo(JobNature::class, 'job_nature');
    }

    public function jobPlace()
    {
        return $this->belongsTo(JobPlace::class, 'job_place');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'job_status');
    }

    public static function getAllJobs($savedJobIds = [])
    {
        $processedData = [];
        $query = self::with(['salaryType', 'experienceRange', 'ageRange', 'company', 'jobNature', 'jobSkills.skill']);

        if (!empty($savedJobIds)) {
            // Filter jobs by the provided saved job IDs
            $query->whereIn('id', $savedJobIds);
        }

        $query->chunk(100, function ($jobs) use (&$processedData) {
            foreach ($jobs as $job) {
                // $jobSkills = $job->jobSkills->map(function ($jobSkill) {
                //     return $jobSkill->skill->skill_name;
                // });
                $jobSkills = $job->jobSkills->take(5)->map(function ($jobSkill) {
                    return $jobSkill->skill->skill_name;
                });

                $processedData[] = (object) [
                    'id' => $job->id,
                    'job_category_id' => $job->job_category_id,
                    'job_title' => $job->job_title,
                    'deadline' => $job->deadline,
                    'job_location' => $job->job_location,
                    'responsibilities' => $job->responsibilities,
                    'salary' => $job->salary,
                    'slug' => $job->slug,
                    'salary_type_name' => optional($job->salaryType)->type,
                    'experience_range_name' => optional($job->experienceRange)->experience,
                    'age_range_name' => optional($job->ageRange)->age,
                    'company_name' => optional($job->company)->company_name,
                    'job_nature_name' => optional($job->jobNature)->nature,
                    'job_skills' => $jobSkills,
                ];
            }
        });

        return new Collection($processedData);
    }

    public static function getJobsByCategory($id)
    {
        $processedData = [];

        self::with(['salaryType', 'experienceRange', 'ageRange', 'company', 'jobNature', 'jobSkills.skill'])
            ->where('job_category_id', $id)
            ->chunk(100, function ($jobs) use (&$processedData) {
                foreach ($jobs as $job) {
                    // $jobSkills = $job->jobSkills->map(function ($jobSkill) {
                    //     return $jobSkill->skill->skill_name;
                    // });
                    $jobSkills = $job->jobSkills->take(5)->map(function ($jobSkill) {
                        return $jobSkill->skill->skill_name;
                    });

                    $processedData[] = (object) [
                        'id' => $job->id,
                        'job_category_id' => $job->job_category_id,
                        'job_title' => $job->job_title,
                        'deadline' => $job->deadline,
                        'job_location' => $job->job_location,
                        'responsibilities' => $job->responsibilities,
                        'salary' => $job->salary,
                        'slug' => $job->slug,
                        'salary_type_name' => optional($job->salaryType)->type,
                        'experience_range_name' => optional($job->experienceRange)->experience,
                        'age_range_name' => optional($job->ageRange)->age,
                        'company_name' => optional($job->company)->company_name,
                        'job_nature_name' => optional($job->jobNature)->nature,
                        'job_skills' => $jobSkills,
                    ];
                }
            });

        return new Collection($processedData);
    }

    public static function getJobsByCompany($id)
    {
        $processedData = [];

        self::with(['salaryType', 'experienceRange', 'ageRange', 'company', 'jobNature', 'jobSkills.skill', 'status'])
            ->where('company_id', $id)
            ->chunk(100, function ($jobs) use (&$processedData) {
                foreach ($jobs as $job) {
                    $jobSkills = $job->jobSkills->take(5)->map(function ($jobSkill) {
                        return $jobSkill->skill->skill_name;
                    });

                    $processedData[] = (object) [
                        'id' => $job->id,
                        'job_category_id' => $job->job_category_id,
                        'job_title' => $job->job_title,
                        'deadline' => $job->deadline,
                        'job_location' => $job->job_location,
                        'responsibilities' => $job->responsibilities,
                        'salary' => $job->salary,
                        'slug' => $job->slug,
                        'salary_type_name' => optional($job->salaryType)->type,
                        'experience_range_name' => optional($job->experienceRange)->experience,
                        'age_range_name' => optional($job->ageRange)->age,
                        'company_name' => optional($job->company)->company_name,
                        'job_nature_name' => optional($job->jobNature)->nature,
                        'job_skills' => $jobSkills,
                        'status' => optional($job->status)->name,
                    ];
                }
            });

            return new Collection($processedData);
    }

    public static function getJobDetail($slug = null, $jobId = null)
    {
        $processedData = [];
        $query = self::with(['salaryType', 'experienceRange', 'ageRange', 'company', 'jobNature', 'jobPlace', 'jobSkills.skill']);

        if ($slug === null) {
            $query->where('id', $jobId);
        } else {
            $query->where('slug', $slug);
        }

        $query->chunk(100, function ($jobs) use (&$processedData) {
            foreach ($jobs as $job) {
                $jobSkills = $job->jobSkills->map(function ($jobSkill) {
                    return $jobSkill->skill->skill_name;
                });
                $jobSkillsId = $job->jobSkills->map(function ($jobSkill) {
                    return $jobSkill->skill->id;
                });
                // dd($jobSkillsId);

                if (isset(app('jobSeeker')->id)) {
                    $isApplied = AppliedJobs::where('job_id', $job->id)->where('js_id', app('jobSeeker')->id)->exists();
                    $isSaved = SavedJobs::where('job_id', $job->id)->where('js_id', app('jobSeeker')->id)->exists();
                } else {
                    $isApplied = $isSaved = null;
                }

                $processedData[] = (object) [
                    'id' => $job->id,
                    'company_id' => $job->company_id,
                    'job_category_id' => $job->job_category_id,
                    'job_title' => $job->job_title,
                    'vacancy' => $job->vacancy,
                    'deadline' => $job->deadline,
                    'job_location' => $job->job_location,
                    'responsibilities' => $job->responsibilities,
                    'salary_type_id' => $job->salary_type_id,
                    'salary' => $job->salary,
                    'age_id' => $job->age_id,
                    'experience_id' => $job->experience_id,
                    'slug' => $job->slug,
                    'job_status' => $job->job_status,
                    'education' => $job->education,
                    'experience_requirments' => $job->experience_requirments,
                    'additional_requirments' => $job->additional_requirments,
                    'responsibilities' => $job->responsibilities,
                    'compensation_benefits' => $job->compensation_benefits,
                    'job_highlights' => $job->job_highlights,
                    'salary_type_name' => optional($job->salaryType)->type,
                    'experience_range_name' => optional($job->experienceRange)->experience,
                    'age_range_name' => optional($job->ageRange)->age,
                    'company_name' => optional($job->company)->company_name,
                    'job_nature' => $job->job_nature,
                    'job_nature_name' => optional($job->jobNature)->nature,
                    'job_place' => $job->job_place,
                    'work_place' => optional($job->jobPlace)->workplace,
                    'job_skills_id' => $jobSkillsId,
                    'job_skills' => $jobSkills,
                    'isApplied' => $isApplied,
                    'isSaved' => $isSaved,
                ];
            }
        });

        return new Collection($processedData);
    }

    /**
     * Get the total number of jobs for each unique experience id and experience name.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getTotalJobsByExperience()
    {
        try {
            // return self::selectRaw('experience_id, COUNT(*) as total_jobs')
            //        ->groupBy('experience_id')
            //        ->with(['experienceRange:id,experience']) // Load relationship and select necessary columns
            //        ->get();

            $processedData = [];

            self::selectRaw('experience_id, COUNT(*) as total_jobs')
                ->groupBy('experience_id')
                ->with(['experienceRange'])
                ->cursor()
                ->each(function ($job) use (&$processedData) {
                    $processedData[] = (object) [
                        'experience_id' => $job->experience_id,
                        'experience_name' => $job->experienceRange->experience,
                        'total_jobs' => $job->total_jobs,
                    ];
                });

            return new Collection($processedData);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Get the total number of jobs for each unique skill id and skill name.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getTotalJobsBySkills()
    {
        $processedData = [];

        JobRequiredSkills::selectRaw('skill_id, COUNT(*) as total_jobs')
            ->groupBy('skill_id')
            ->with(['skill'])
            ->cursor()
            ->each(function ($job) use (&$processedData) {
                $processedData[] = (object) [
                    'skill_id' => $job->skill_id,
                    'skill_name' => $job->skill->skill_name,
                    'total_jobs' => $job->total_jobs,
                ];
            });

        return new Collection($processedData);
    }

    /**
     * Get the total number of jobs for each unique job nature.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getTotalJobsByJobType()
    {
        try {
            $processedData = [];
            self::selectRaw('job_nature, COUNT(*) as total_jobs')
                ->groupBy('job_nature')
                ->with(['jobNature'])
                ->cursor()
                ->each(function ($job) use (&$processedData) {
                    $processedData[] = (object) [
                        'job_type_id' => $job->job_nature,
                        'job_nature' => $job->jobNature->nature,
                        'total_jobs' => $job->total_jobs,
                    ];
                });

            return new Collection($processedData);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Get the total number of jobs for each job place.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getTotalJobsByJobPlace()
    {
        $processedData = [];

        self::selectRaw('job_place, COUNT(*) as total_jobs')
            ->groupBy('job_place')
            ->with(['jobPlace'])
            ->cursor()
            ->each(function ($job) use (&$processedData) {
                $processedData[] = (object) [
                    'job_place_id' => $job->job_place,
                    'job_place' => $job->jobPlace->workplace,
                    'total_jobs' => $job->total_jobs,
                ];
            });

        return new Collection($processedData);
    }

    public static function filterJobs($request)
    {
        // dd($request);
        $query = self::query()->with(['salaryType', 'experienceRange', 'ageRange', 'company', 'jobNature', 'jobSkills.skill']);

        // Handle Text Input (Job Title)
        if ($request->filled('job_title')) {
            $query->orWhere('job_title', 'like', '%' . $request->input('job_title') . '%');
        }

        if ($request->filled('job_nature_id')) {
            $query->orWhereIn('job_nature', $request->input('job_nature_id'));
        }

        if ($request->filled('job_place_id')) {
            $query->orWhereIn('job_place', $request->input('job_place_id'));
        }

        // Handle Checkbox Inputs (Job Categories, Experience, Job Nature, Job Place)
        $checkboxInputs = ['job_category_id', 'experience_id'];
        foreach ($checkboxInputs as $input) {
            if ($request->filled($input)) {
                $query->orWhereIn($input, $request->input($input));
            }
        }

        // Handle Skills Filtering
        if ($request->filled('skill_id')) {
            // Retrieve job_ids based on selected skill_ids from JobRequiredSkills model
            $jobIds = JobRequiredSkills::whereIn('skill_id', $request->input('skill_id'))->pluck('job_id');
            // Filter jobs based on retrieved job_ids
            $query->orWhereIn('id', $jobIds);
        }

        // Retrieve filtered jobs using chunk
        $rprocessedDataesult = [];
        $query->chunk(100, function ($jobs) use (&$processedData) {
            foreach ($jobs as $job) {
                $jobSkills = $job->jobSkills->take(5)->map(function ($jobSkill) {
                    return $jobSkill->skill->skill_name;
                });
                // $processedData[] = $job;
                $processedData[] = (object) [
                    'id' => $job->id,
                    'job_category_id' => $job->job_category_id,
                    'job_title' => $job->job_title,
                    'deadline' => $job->deadline,
                    'job_location' => $job->job_location,
                    'responsibilities' => $job->responsibilities,
                    'salary' => $job->salary,
                    'slug' => $job->slug,
                    'salary_type_name' => optional($job->salaryType)->type,
                    'experience_range_name' => optional($job->experienceRange)->experience,
                    'age_range_name' => optional($job->ageRange)->age,
                    'company_name' => optional($job->company)->company_name,
                    'job_nature_name' => optional($job->jobNature)->nature,
                    'job_skills' => $jobSkills,
                ];
            }
        });

        return new Collection($processedData);
    }

    public static function filterJobs1($request)
    {
        $jobIds = [];

        // Handle Text Input (Job Title)
        if ($request->filled('job_title')) {
            $jobIds = array_merge($jobIds, self::where('job_title', 'like', '%' . $request->input('job_title') . '%')->pluck('id')->toArray());
        }

        // Handle Checkbox Inputs (Job Categories, Experience, Job Nature, Job Place)
        $checkboxInputs = ['job_category_id', 'experience_id', 'job_nature_id', 'job_place_id'];
        foreach ($checkboxInputs as $input) {
            if ($request->filled($input)) {
                dump($input);
                $jobIds[] = array_merge($jobIds, self::whereIn($input, $request->input($input))->pluck('id')->toArray());
                dump($jobIds);
            }
        }

        // Handle Skills Filtering
        if ($request->filled('skill_id')) {
            $jobIds = array_merge($jobIds, JobRequiredSkills::whereIn('skill_id', $request->input('skill_id'))->pluck('job_id')->toArray());
        }

        dd($jobIds);

        // Retrieve unique job IDs
        $uniqueJobIds = array_unique($jobIds);

        // Retrieve jobs based on unique job IDs
        $result = self::whereIn('id', $uniqueJobIds)->get();

        return $result;
    }
}
