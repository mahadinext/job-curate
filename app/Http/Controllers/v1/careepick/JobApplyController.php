<?php

namespace App\Http\Controllers\v1\careepick;

use Exception;
use App\Models\Jobs;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\v1\careepick\JobApplicationStatus;
use App\Models\v1\careepick\JobSeeker\AppliedJobs;

class JobApplyController extends Controller
{
    /**
     * @integer $id
     *
     * @return view
     */
    public function index($jpId, $jobId): view
    {
        $isApplied = AppliedJobs::where('job_id', $jobId)->where('js_id', app('jobSeeker')->id)->exists();
        return view('v1.careepick.pages.common.check-cv', ["jobId" => $jobId, "jpId" => $jpId, "isApplied" => $isApplied ]);
    }

    public function jsApplyJobOnline($jpId, $jobId)
    {
        try {
            $checkApplliedJob = AppliedJobs::where('job_id', $jobId)
            ->where('js_id', app('jobSeeker')->id)
            ->first();

            if ($checkApplliedJob) {
                $jobData = Jobs::getJobDetail($jobId);
                return view('v1.careepick.pages.common.job-detail', ['jobData' => $jobData])->with('redirectWarningMessage', 'You have already applied this job');
            } else {
                AppliedJobs::create([
                    'job_id' => $jobId,
                    'company_id' => $jpId,
                    'js_id' => app('jobSeeker')->id,
                    'job_application_status' => 1
                ]);
                return redirect()->route('js-apply-job-successful');
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function jsApplyJobOnlineSuccessful()
    {
        try {
            return view('v1.careepick.pages.common.job-application-successful')->with('redirectWarningMessage', 'You have already applied this job');
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function manageAllApplicantions(Request $request): View
    {
        $employeeId = app('jobSeeker')->id;
        $statusFilter = ($request->input('status_id')) ? $request->input('status_id') : null;
        $dateFilter = ($request->input('date_order', 'desc')) ? $request->input('date_order', 'desc') : 'desc';

        $applicationsData = AppliedJobs::getJobApplicationsForEmployee($employeeId, $statusFilter, $dateFilter);

        $statuses = JobApplicationStatus::all();

        return view('v1.careepick.dashboard.job-seeker.manage-applications', [
            'jobsData' => $applicationsData,
            'statuses' => $statuses,
            'oldInput' => $request->all(),
        ]);
    }
}
