<?php

namespace App\Http\Controllers\v1\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class AdHomePageController extends Controller
{
    public function getHeroSection()
    {
        $heroSection = [];
        $homePage = Pages::where('page_name', 'home')->first();
        if ($homePage) {
            $pageContents = (object) json_decode($homePage->page_contents, true);
            if (isset($pageContents->hero_section)) {
                $heroSection = $pageContents->hero_section;
            }
        }
        $heroSection = new Collection($heroSection);

        return view('v1.careepick.dashboard.admin.pages.home.hero-section', compact('heroSection'));
    }

    public function heroSectionUpdate(Request $request)
    {
        try {
            $pageContents = (object) [];
            $params = [
                'sub_title' => $request->sub_title,
                'title' => $request->title,
                'description' => $request->description,
            ];

            $homePage = Pages::where('page_name', 'home')->first();
            if ($homePage) {
                $pageContents = (object) json_decode($homePage->page_contents, true);
                $pageContents->hero_section = $params;
                Pages::where('page_name', 'home')->update(['page_contents' => json_encode($pageContents, true)]);

                return back()->with('success', 'Hero Section updated successfully!');
            }

            $pageContents->hero_section = $params;
            $pages = new Pages();
            $pages->page_name = 'home';
            $pages->page_contents = json_encode($pageContents, true);
            $pages->save();

            return back()->with('success', 'Hero Section data inserted successfully!');
        } catch (Exception $e) {
            Log::error("AdHomePageController::heroSectionUpdate()", [$e]);
        }
    }
}
