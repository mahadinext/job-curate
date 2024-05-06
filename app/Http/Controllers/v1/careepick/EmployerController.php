<?php

namespace App\Http\Controllers\v1\careepick;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function employer(): view
    {
        return view('v1.careepick.pages.common.employer-list');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function employerList(): view
    {
        return view('v1.careepick.pages.common.employer-list');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function employerDetail(): view
    {
        return view('v1.careepick.pages.common.employer-detail');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function createCompany(): view
    {
        return view('v1.careepick.pages.employer.create-company');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function manageResume(): view
    {
        return view('v1.careepick.pages.employer.manage-resume');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function createJob(): view
    {
        return view('v1.careepick.pages.employer.create-job');
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function resumeDetail(): view
    {
        return view('v1.careepick.pages.employee.resume-detail');
    }
}
