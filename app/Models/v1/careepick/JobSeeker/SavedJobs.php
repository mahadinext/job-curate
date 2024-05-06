<?php

namespace App\Models\v1\careepick\JobSeeker;

use App\Models\Jobs;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\v1\careepick\Recruiter\Company;
use App\Models\v1\careepick\JobSeeker\JobSeeker;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavedJobs extends Model
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

    public static function getSavedJobs($employeeId)
    {
        $processedData = [];

        self::with(['jobInfo', 'jobSeeker', 'jobProvider'])
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
                    ];
                }
            });

            return new Collection($processedData);
    }
}
