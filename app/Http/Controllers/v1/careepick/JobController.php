<?php

namespace App\Http\Controllers\v1\careepick;

use Exception;
use App\Models\Jobs;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\v1\careepick\JobCategory;
use App\Models\v1\careepick\JobSeeker\SavedJobs;

class JobController extends Controller
{
    /**
     * redirect to job list page with required data
     *
     * @return view
     */
    public function index(): view
    {
        try {
            $data = $this->jobListData();
            // dd($data);

            return view('v1.careepick.pages.common.job-list', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function filterJobs(Request $request)
    {
        try {
            // dd($request);
            $data = $this->jobListData($request);
            // return redirect()->back()->with($data);
            return view('v1.careepick.pages.common.job-list', array_merge($data, ['oldInput' => $request->all()]));
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    private function jobListData($request = null)
    {
        try {
            $jobCategoryData = JobCategory::withCount('jobs')->get();
            $jobsData = ($request != null) ? Jobs::filterJobs($request) : Jobs::getAllJobs();
            $jobsByExperience = Jobs::getTotalJobsByExperience();
            $jobsBySkill = Jobs::getTotalJobsBySkills();
            $jobsByJobNature = Jobs::getTotalJobsByJobType();
            $jobsByJobPlace = Jobs::getTotalJobsByJobPlace();

            $data = [
                'jobCategoryData' => $jobCategoryData,
                'jobsData' => $jobsData,
                'jobsByExperience' => $jobsByExperience,
                'jobsBySkill' => $jobsBySkill,
                'jobsByJobNature' => $jobsByJobNature,
                'jobsByJobPlace' => $jobsByJobPlace,
            ];
            // dd($data);

            return $data;
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * redirect to job list page with required data
     *
     * @return view
     */
    public function fetchJobByCategory($id)
    {
        try{
            $jobCategoryData = JobCategory::withCount('jobs')->get();
            $jobCategoryData->transform(function ($item) use ($id) {
                if ($item->id == $id) {
                    $item->isSelected = true;
                } else {
                    $item->isSelected = false;
                }

                return $item;
            });

            $jobsData = Jobs::getJobsByCategory($id);
            $jobCategoryData = JobCategory::withCount('jobs')->get();
            $jobsByExperience = Jobs::getTotalJobsByExperience();
            $jobsBySkill = Jobs::getTotalJobsBySkills();
            $jobsByJobNature = Jobs::getTotalJobsByJobType();
            $jobsByJobPlace = Jobs::getTotalJobsByJobPlace();

            $data = [
                'jobCategoryData' => $jobCategoryData,
                'jobsData' => $jobsData,
                'jobsByExperience' => $jobsByExperience,
                'jobsBySkill' => $jobsBySkill,
                'jobsByJobNature' => $jobsByJobNature,
                'jobsByJobPlace' => $jobsByJobPlace,
            ];

            // dd($data);

            return view('v1.careepick.pages.common.job-list', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function manageJob(): view
    {
        return view('v1.careepick.pages.employee.manage-job');
    }

    /**
     * redirect to detail page with required data
     *
     * @return view
     */
    public function jobDetail($slug): view
    {
        try {
            // $jobData = Jobs::select("*")->where('slug', $slug)->get();
            $jobData = Jobs::getJobDetail($slug);
            // dd($jobData);

            return view('v1.careepick.pages.common.job-detail', ['jobData' => $jobData]);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function browseCategory(): view
    {
        return view('v1.careepick.pages.common.job-category');
    }

    public function saveJob($jpId, $jobId)
    {
        try {
            $jobData = Jobs::getJobDetail($slug = null, $jobId);
            $isSaved = SavedJobs::where('job_id', $jobId)->where('js_id', app('jobSeeker')->id)->exists();
            if (!$isSaved) {
                SavedJobs::create([
                    'job_id' => $jobId,
                    'company_id' => $jpId,
                    'js_id' => app('jobSeeker')->id,
                ]);
                return view('v1.careepick.pages.common.job-detail', ['jobData' => $jobData])->with('redirectSuccessMessage', 'You have successfully saved this job');
            } else {
                return view('v1.careepick.pages.common.job-detail', ['jobData' => $jobData])->with('redirectWarningMessage', 'You have already saved this job');
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function savedJobs()
    {
        try {
            // Retrieve saved jobs data for the current job seeker
            $savedJobsData = SavedJobs::where('js_id', app('jobSeeker')->id)->get();

            // Extract job IDs from the saved jobs data
            $jobIds = $savedJobsData->pluck('job_id')->toArray();

            if (!empty($jobIds)) {
                // Get all jobs data filtered by the saved job IDs
                $jobsData = Jobs::getAllJobs($jobIds);
                $data = ['jobsData' => $jobsData];
            } else {
                $data = ['jobsData' => null];
            }

            return view('v1.careepick.pages.common.saved-jobs', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
