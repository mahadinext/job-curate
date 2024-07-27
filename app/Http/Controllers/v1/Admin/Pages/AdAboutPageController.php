<?php

namespace App\Http\Controllers\v1\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class AdAboutPageController extends Controller
{
    public function getAboutPage()
    {
        $heroSection = $bodySection = [];
        $aboutusPage = Pages::where('page_name', 'about-us')->first();
        if ($aboutusPage) {
            $pageContents = (object) json_decode($aboutusPage->page_contents, true);
            if (isset($pageContents->hero_section)) {
                $heroSection = $pageContents->hero_section;
            }
            if (isset($pageContents->body_section)) {
                $bodySection = $pageContents->body_section;
            }
        }

        return view('v1.careepick.dashboard.admin.pages.about.index', compact('heroSection', 'bodySection'));
    }

    public function aboutPageUpdate(Request $request)
    {
        try {
            $pageContents = (object) [];
            $heroSectionParams = [
                'title' => $request->hero_title,
                'description' => $request->hero_description,
            ];
            $bodySectionParams = [
                'title' => $request->body_title,
                'description' => $request->body_description,
            ];

            $aboutusPage = Pages::where('page_name', 'about-us')->first();
            if ($aboutusPage) {
                $pageContents = (object) json_decode($aboutusPage->page_contents, true);
                $pageContents->hero_section = $heroSectionParams;
                $pageContents->body_section = $bodySectionParams;
                Pages::where('page_name', 'about-us')->update(['page_contents' => json_encode($pageContents, true)]);

                return back()->with('success', 'About Page updated successfully!');
            }

            $pageContents->hero_section = $heroSectionParams;
            $pageContents->body_section = $bodySectionParams;
            Pages::create([
                'page_name' => 'about-us',
                'page_contents' => json_encode($pageContents, true),
            ]);

            return back()->with('success', 'About Page data inserted successfully!');
        } catch (Exception $e) {
            Log::error("AdAboutPageController::aboutPageUpdate()", [$e]);
        }
    }
}
