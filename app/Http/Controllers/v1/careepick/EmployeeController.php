<?php

namespace App\Http\Controllers\v1\careepick;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function employee(): view
    {
        return view('v1.careepick.pages.employee.employee-list');
    }
}
