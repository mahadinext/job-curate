<?php

namespace App\Http\Controllers\v1\careepick;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class TermsPolicyPageController extends Controller
{
    /**
     * redirect to page with required data
     *
     * @return view
     */
    public function index(): view
    {
        try {
            $termsPolicyPage = Pages::where('page_name', 'terms-policy')->first();
            $pageContents = json_decode($termsPolicyPage->page_contents, true);

            return view('v1.careepick.pages.common.terms-policy', compact('pageContents'));
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
