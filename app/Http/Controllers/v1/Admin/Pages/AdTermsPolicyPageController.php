<?php

namespace App\Http\Controllers\v1\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class AdTermsPolicyPageController extends Controller
{
    public function getTermsPolicyPage()
    {
        $pageContents = [];
        $termsPolicyPage = Pages::where('page_name', 'terms-policy')->first();
        if ($termsPolicyPage) {
            $pageContents = json_decode($termsPolicyPage->page_contents, true);
        }

        return view('v1.careepick.dashboard.admin.pages.terms-policy.index', compact('pageContents'));
    }

    public function termsPolicyPageUpdate(Request $request)
    {
        try {
            $pageContents = (object) [];
            $params = [
                "section_1" => [
                    "title" => $request->title_1,
                    "description" => $request->description_1,
                ],
                "section_2" => [
                    "title" => $request->title_2,
                    "description" => $request->description_2,
                ],
                "section_3" => [
                    "title" => $request->title_3,
                    "description" => $request->description_3,
                ],
                "section_4" => [
                    "title" => $request->title_4,
                    "description" => $request->description_4,
                ],
                "section_5" => [
                    "title" => $request->title_5,
                    "description" => $request->description_5,
                ],
                "section_6" => [
                    "title" => $request->title_6,
                    "description" => $request->description_6,
                ],
                "section_7" => [
                    "title" => $request->title_7,
                    "description" => $request->description_7,
                ],
            ];

            $termsPolicyPage = Pages::where('page_name', 'terms-policy')->first();
            if ($termsPolicyPage) {
                $pageContents = (object) json_decode($termsPolicyPage->page_contents, true);
                $pageContents = $params;
                Pages::where('page_name', 'terms-policy')->update(['page_contents' => json_encode($pageContents, true)]);

                return back()->with('success', 'Terms & Policy updated successfully!');
            }

            $pageContents = $params;
            Pages::create([
                'page_name' => 'terms-policy',
                'page_contents' => json_encode($pageContents, true),
            ]);

            return back()->with('success', 'Terms & Policy Page data inserted successfully!');
        } catch (Exception $e) {
            Log::error("AdTermsPolicyPageController::termsPolicyPageUpdate()", [$e]);
        }
    }
}
