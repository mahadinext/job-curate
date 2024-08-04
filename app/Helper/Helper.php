<?php

namespace App\Helper;

use App\Models\Jobs;
use App\Models\v1\careepick\JobSeeker\AppliedJobs;
use App\Models\v1\careepick\JobSeeker\JobSeeker;

class Helper
{

    /**
     * For Job Seeker
     * @return integer
     */
    public static function getTotalJobCount() {
        return Jobs::count();
    }

    /**
     * For Job Seeker
     * @return integer
     */
    public static function getTotalAppliedJobCount() {
        $jobSeeker = app('jobSeeker');
        return AppliedJobs::where("js_id", $jobSeeker->id)->count();
    }

    /**
     * For Job Seeker
     * @return integer|null
     */
    public static function getTotalShortlistedJobCount() {
        $jobSeeker = app('jobSeeker');
        return AppliedJobs::where("js_id", $jobSeeker->id)->whereIn("job_application_status", [2,4])->count();
    }

    /**
     * For Job Seeker
     * @return object|null
     */
    public static function getAppliedJobs() {
        $jobSeeker = app('jobSeeker');
        return Jobs::getEmployeeAppliedJobs($jobSeeker->id);
    }

    /**
     * For Job Provider
     * @return integer
     */
    public static function getTotalPostedJobCount() {
        $jobProvider = app('jobProvider');
        return Jobs::where("company_id", $jobProvider->id)->count();
    }

    /**
     * For Job Provider
     * @return integer|null
     */
    public static function getTotalApplicationCount() {
        $jobProvider = app('jobProvider');
        return AppliedJobs::where("company_id", $jobProvider->id)->count();
    }

    /**
     * For Job Provider
     * @return integer|null
     */
    public static function getTotalShortlistedApplicantCount() {
        $jobProvider = app('jobProvider');
        return AppliedJobs::where("company_id", $jobProvider->id)->whereIn("job_application_status", [2,4])->count();
    }

    /**
     * For Job Provider
     * @return object|null
     */
    public static function getRecentApplicants() {
        $jobProvider = app('jobProvider');
        $applicationsData = AppliedJobs::getJobApplicationsForEmployer($jobProvider->id);
        return $applicationsData;
    }
}
