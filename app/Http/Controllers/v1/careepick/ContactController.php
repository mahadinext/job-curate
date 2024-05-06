<?php

namespace App\Http\Controllers\v1\careepick;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function contact(): view
    {
        return view('v1.careepick.pages.common.contact');
    }
}
