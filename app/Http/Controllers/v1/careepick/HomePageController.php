<?php

namespace App\Http\Controllers\v1\careepick;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\Pages;
use App\Models\v1\careepick\JobCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class HomePageController extends Controller
{
    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function index(): view
    {
        try {
            $homePageContents = [];
            $jobCategoryData = JobCategory::withCount('jobs')->get();
            $jobsByExperience = Jobs::getTotalJobsByExperience();
            // $jobsBySkill = Jobs::getTotalJobsBySkills();
            $jobsByJobNature = Jobs::getTotalJobsByJobType();
            $jobsByJobPlace = Jobs::getTotalJobsByJobPlace();

            $homePage = Pages::where('page_name', 'home')->first();
            $heroSection = json_decode($homePage->page_contents, true)['hero_section'];

            $counts = Pages::where('page_name', 'count')->first();

            $latestJobsData = Jobs::getLatestJobs(8);

            $data = [
                'jobCategoryData' => $jobCategoryData,
                'jobsByExperience' => $jobsByExperience,
                // 'jobsBySkill' => $jobsBySkill,
                'jobsByJobNature' => $jobsByJobNature,
                'jobsByJobPlace' => $jobsByJobPlace,
                'heroSection' => $heroSection,
                'counts' => json_decode($counts->page_contents, true),
                'latestJobsData' => $latestJobsData,
            ];

            return view('v1.careepick.pages.common.home', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
