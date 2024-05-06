<?php

namespace App\Models;

use App\Models\v1\careepick\Day;
use App\Models\v1\careepick\JobApplicationStatus;
use App\Models\v1\careepick\Recruiter\Company;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobApplicationStatusTracker extends Model
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
        'scheduled_day',
        'scheduled_date',
        'scheduled_time',
        'scheduled_location',
        'scheduled_address',
        'scheduled_url',
        'required_documents',
        'read',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class, 'scheduled_day');
    }

    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function jobApplicationStatus()
    {
        return $this->belongsTo(JobApplicationStatus::class, 'job_application_status');
    }

    public static function getInfo($jobId = null, $jsId = null, $applicationStatus = null)
    {
        $processedData = [];
        $query = self::with(['day', 'jobApplicationStatus']);
        // $query->where([['job_id' => $jobId], ['js_id' => $jsId], ['job_application_status' => $applicationStatus]]);
        $query->where('job_id', $jobId);
        $query->where('js_id', $jsId);
        $query->where('job_application_status', $applicationStatus);

        $query->chunk(100, function ($statusTracker) use (&$processedData) {
            foreach ($statusTracker as $data) {
                $processedData[] = (object) [
                    'tracker_id' => $data->id,
                    'application_status' => $data->jobApplicationStatus->status,
                    'scheduled_day' => $data->day->day_name,
                    'scheduled_day_id' => $data->scheduled_day,
                    'scheduled_time' => $data->scheduled_time,
                    'scheduled_date' => $data->scheduled_date,
                    'scheduled_location' => $data->scheduled_location,
                    'scheduled_address' => $data->scheduled_address,
                    'scheduled_url' => $data->scheduled_url,
                    'required_documents' => $data->required_documents
                ];
            }
        });

        return new Collection($processedData);
    }

    public static function getNotificationdata($jsId = null)
    {
        $processedData = [];
        $query = self::with(['day', 'job', 'company', 'jobApplicationStatus']);
        $query->where('js_id', $jsId);
        // $query->where('read', null);
        $query->orderBy('created_at', 'desc')->take(5);

        $query->chunk(100, function ($notifications) use (&$processedData) {
            foreach ($notifications as $data) {
                $notiMsg = "You have been " . $data->jobApplicationStatus->status . " for " . $data->job->job_title . " post "
                            . " at " . $data->company->company_name;
                $processedData[] = (object) [
                    'id' => $data->id,
                    'job_title' => $data->job->job_title,
                    'application_status' => $data->jobApplicationStatus->status,
                    'company' => $data->company->company_name,
                    'scheduled_day_id' => $data->scheduled_day,
                    'scheduled_time' => $data->scheduled_time,
                    'scheduled_date' => $data->scheduled_date,
                    'scheduled_location' => $data->scheduled_location,
                    'scheduled_address' => $data->scheduled_address,
                    'scheduled_url' => $data->scheduled_url,
                    'required_documents' => $data->required_documents,
                    'message' => $notiMsg,
                    'read' => $data->read,
                ];
            }
        });

        return new Collection($processedData);
    }
}
