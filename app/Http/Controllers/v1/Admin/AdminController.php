<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\v1\careepick\JobSeeker\JobSeeker;
use App\Models\v1\careepick\Recruiter\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AdminController extends Controller
{
    private $user = [];

    /**
     * redirect to destined page with required data
     *
     * @return view
     */
    public function recruitersPage(): view
    {
        $companiesData = Company::select("*")->get();
        $data = [
            'companiesData' => $companiesData,
        ];

        return view('v1.careepick.dashboard.admin.recruiters', $data);
    }

    /**
     * redirect to destined page with required data
     *
     * @return view
     */
    public function employeesPage(): view
    {
        $jobSeekersData = JobSeeker::select("*")->get();
        $data = [
            'jobSeekersData' => $jobSeekersData,
        ];

        return view('v1.careepick.dashboard.admin.employees', $data);
    }
}
