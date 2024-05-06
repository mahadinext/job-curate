<?php

namespace App\Http\Controllers\v1\careepick;

use Exception;
use App\Models\Jobs;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\v1\careepick\JobCategory;

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
            $jobCategoryData = JobCategory::withCount('jobs')->get();
            $jobsByExperience = Jobs::getTotalJobsByExperience();
            $jobsBySkill = Jobs::getTotalJobsBySkills();
            $jobsByJobNature = Jobs::getTotalJobsByJobType();
            $jobsByJobPlace = Jobs::getTotalJobsByJobPlace();

            $data = [
                'jobCategoryData' => $jobCategoryData,
                'jobsByExperience' => $jobsByExperience,
                'jobsBySkill' => $jobsBySkill,
                'jobsByJobNature' => $jobsByJobNature,
                'jobsByJobPlace' => $jobsByJobPlace,
            ];

            return view('v1.careepick.pages.common.home', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
