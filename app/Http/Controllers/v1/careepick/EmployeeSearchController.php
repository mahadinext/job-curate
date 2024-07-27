<?php

namespace App\Http\Controllers\v1\careepick;

use App\Http\Controllers\Controller;
use App\Http\Controllers\v1\JobSeeker\ResumeBuilderController;
use App\Models\ExperienceRange;
use App\Models\v1\careepick\EducationLevels;
use App\Models\v1\careepick\JobSeeker\JobSeeker;
use App\Models\v1\careepick\JobSeeker\JobSeekerSkills;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use ReflectionMethod;

class EmployeeSearchController extends Controller
{
    /**
     * redirect to job list page with required data
     *
     * @return view
     */
    public function index(): view
    {
        try {
            $data = $this->employeeListData();
            // dd($data);

            return view('v1.careepick.pages.common.employee-list', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function filterEmployee(Request $request)
    {
        try {
            // dd($request);
            $data = $this->employeeListData($request);

            // Return the response
            return view('v1.careepick.pages.common.employee-list', array_merge($data, ['oldInput' => $request->all()]));

        } catch (Exception $exception) {
            Log::error("Error filtering companies: " . $exception->getMessage());
            // Handle exceptions as needed
            return redirect()->back()->with('error', 'Failed to filter companies. Please try again.');
        }
    }

    private function getFilteredEmployee($request)
    {
        // dd($request);
        $query = JobSeeker::query();

        // Filter by skills
        if ($request->filled('skill_id')) {
            $query->whereHas('jobSeekerSkills', function ($q) use ($request) {
                $q->whereIn('skill_id', $request->skill_id);
            });
        }

        // Filter by experience: Logic 1
        // if ($request->filled('experience_id')) {
        //     $experienceRanges = ExperienceRange::whereIn('id', $request->experience_id)->get();

        //     // Collect matching job seeker IDs
        //     $matchingJobSeekerIds = JobSeeker::all()->filter(function ($jobSeeker) use ($experienceRanges) {
        //         foreach ($experienceRanges as $range) {
        //             if ($jobSeeker->matchesRange($jobSeeker->total_experience, $range->experience)) {
        //                 return true;
        //             }
        //         }
        //         return false;
        //     })->pluck('id');

        //     // Add a whereIn clause to the query with the matching job seeker IDs
        //     $query->whereIn('id', $matchingJobSeekerIds);
        // }

        // Filter by experience: Logic 2
        if ($request->filled('experience_id')) {
            $experienceRanges = ExperienceRange::whereIn('id', $request->experience_id)->get();

            $query->where(function ($query) use ($experienceRanges) {
                foreach ($experienceRanges as $range) {
                    $query->orWhere(function ($query) use ($range) {
                        if (preg_match('/(\d+) to (\d+) years/', $range->experience, $matches)) {
                            $query->whereBetween('total_experience', [$matches[1], $matches[2]]);
                        } elseif (preg_match('/At least (\d+) years/', $range->experience, $matches)) {
                            $query->where('total_experience', '>=', $matches[1]);
                        } elseif (preg_match('/At most (\d+) years/', $range->experience, $matches)) {
                            $query->where('total_experience', '<=', $matches[1]);
                        } elseif (preg_match('/(\d+)\+ years/', $range->experience, $matches)) {
                            $query->where('total_experience', '>=', $matches[1]);
                        } elseif ($range->experience == 'N/A') {
                            $query->where('total_experience', '>=', 0);
                        }
                    });
                }
            });
        }

        // Filter by education
        if ($request->has('education_id')) {
            $query->whereHas('jobSeekerEducations', function ($query) use ($request) {
                $query->whereIn('education_level_id', $request->education_id);
            });
        }

        return $query->get();
    }

    private function employeeListData($request = null)
    {
        try {
            $experienceRange = ExperienceRange::all();
            $employeeBySkills = JobSeekerSkills::with('skills:id,skill_name')->distinct('skill_id')->get();
            $employeeData = ($request == null) ? null : $this->getFilteredEmployee($request);
            $educationLevelsData = EducationLevels::all();
            // dd($employeeData);

            $data = [
                'experienceRange' => $experienceRange,
                'jobsBySkill' => $employeeBySkills,
                'employeeData' => $employeeData,
                'educationLevelsData' => $educationLevelsData,
            ];
            // dd($data);

            return $data;
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function getEmployee($id)
    {
        try {
            $resumeBuilderController = new ResumeBuilderController();
            // $data = $resumeBuilderController->getNecessaryData($id);
            // Using reflection to call a protected method
            $reflection = new ReflectionMethod(ResumeBuilderController::class, 'getNecessaryData');
            $reflection->setAccessible(true);

            $data = $reflection->invoke($resumeBuilderController, $id);
            // dd($data);

            return view('v1.careepick.dashboard.job-seeker.resume', $data);
        } catch (Exception $e) {
            Log::error("EmployeeSearchController::getEmployee()", [$e]);
        }
    }
}
