<?php

namespace App\Http\Controllers\v1\careepick;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\v1\careepick\Country;
use App\Models\v1\careepick\District;
use App\Models\v1\careepick\EmployeeSize;
use App\Models\v1\careepick\EmploymentType;
use App\Models\v1\careepick\JobCategory;
use App\Models\v1\careepick\Recruiter\Company;
use App\Models\v1\careepick\Upazila;
use App\Models\v1\careepick\Year;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class EmployerSearchController extends Controller
{
    /**
     * redirect to job list page with required data
     *
     * @return view
     */
    public function index(): view
    {
        try {
            $data = $this->companyListData();
            // dd($data);

            return view('v1.careepick.pages.common.employer-list', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function filterCompanies(Request $request)
    {
        try {
            // dd($request);
            $data = $this->companyListData($request);

            // Return the response
            return view('v1.careepick.pages.common.employer-list', array_merge($data, ['oldInput' => $request->all()]));
            return view('your-view', compact('companies'));

        } catch (Exception $exception) {
            Log::error("Error filtering companies: " . $exception->getMessage());
            // Handle exceptions as needed
            return redirect()->back()->with('error', 'Failed to filter companies. Please try again.');
        }
    }

    private function getfilteredCompanies($request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'company_id' => 'nullable|exists:companies,id', // Validate company_id if selected
            'job_category_id' => 'nullable|array',
            'job_category_id.*' => 'exists:job_categories,id',
            'skill_id' => 'nullable|array',
            'skill_id.*' => 'exists:skills,id',
            'experience_id' => 'nullable|array',
            'experience_id.*' => 'exists:experience_ranges,id',
            'job_nature_id' => 'nullable|array',
            'job_nature_id.*' => 'exists:job_natures,id',
            'job_place_id' => 'nullable|array',
            'job_place_id.*' => 'exists:job_places,id',
        ]);

        // Start querying companies based on filters
        $companiesQuery = Company::query();

        // Apply filters based on form inputs
        if ($request->filled('company_id')) {
            $companiesQuery->where('id', $validatedData['company_id']);
        }

        // Filter by job categories
        if ($request->filled('job_category_id')) {
            $companiesQuery->whereHas('jobs', function ($query) use ($validatedData) {
                $query->whereIn('job_category_id', $validatedData['job_category_id']);
            });
        }

        // Filter by skills
        if ($request->filled('skill_id')) {
            $companiesQuery->whereHas('jobs.jobSkills', function ($query) use ($validatedData) {
                $query->whereIn('skill_id', $validatedData['skill_id']);
            });
        }

        // Filter by experience
        if ($request->filled('experience_id')) {
            $companiesQuery->whereHas('jobs.experienceRange', function ($query) use ($validatedData) {
                $query->whereIn('id', $validatedData['experience_id']);
            });
        }

        // Filter by job types
        if ($request->filled('job_nature_id')) {
            $companiesQuery->whereHas('jobs', function ($query) use ($validatedData) {
                $query->whereIn('job_nature', $validatedData['job_nature_id']);
            });
        }

        // Filter by job places
        if ($request->filled('job_place_id')) {
            $companiesQuery->whereHas('jobs', function ($query) use ($validatedData) {
                $query->whereIn('job_place', $validatedData['job_place_id']);
            });
        }

        // Get the filtered companies
        $companyData = $companiesQuery->get()->toArray();

        return $companyData;
    }

    private function companyListData($request = null)
    {
        try {
            $jobCategoryData = JobCategory::withCount('jobs')->get();
            $jobsByExperience = Jobs::getTotalJobsByExperience();
            $jobsBySkill = Jobs::getTotalJobsBySkills();
            $jobsByJobNature = Jobs::getTotalJobsByJobType();
            $jobsByJobPlace = Jobs::getTotalJobsByJobPlace();
            $jobProvidersData = Company::select('id', 'company_name')->get();
            $companyData = ($request == null) ? null : $this->getfilteredCompanies($request);
            // dd($companyData);

            $data = [
                'jobCategoryData' => $jobCategoryData,
                'jobsByExperience' => $jobsByExperience,
                'jobsBySkill' => $jobsBySkill,
                'jobsByJobNature' => $jobsByJobNature,
                'jobsByJobPlace' => $jobsByJobPlace,
                'jobProvidersData' => $jobProvidersData,
                'companyData' => $companyData,
            ];
            // dd($data);

            return $data;
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function getEmployer($id)
    {
        $profileData = Company::where('id', $id)->first();
        $jobsData = Jobs::getJobsByCompany($id);
        // dd($jobsData);

        $data = [
            'profileData' => $profileData,
            'jobsData' => $jobsData,
        ];

        return view('v1.careepick.pages.common.employer-detail', $data);
    }
}
