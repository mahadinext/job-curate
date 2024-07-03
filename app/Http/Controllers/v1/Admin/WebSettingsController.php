<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\v1\careepick\WebInfo;
use App\Models\v1\careepick\WebLogo;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebSettingsController extends Controller
{
    /**
     * redirect to dedicate page with required data
     *
     * @return view
     */
    public function webLogoPage()
    {
        $webLogo = WebLogo::first();
        return view('v1.careepick.dashboard.admin.web-settings.logo', compact('webLogo'));
    }

    public function webLogoUpdate(Request $request)
    {
        $request->validate([
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $webLogo = WebLogo::first();

            if ($request->hasFile('company_logo')) {
                $logoPath = public_path('assets/img/web/logo.png');
                if (File::exists($logoPath)) {
                    File::delete($logoPath);
                }
                $request->file('company_logo')->move(public_path('assets/img/web'), 'logo.png');
                $webLogo->logo = 'assets/img/web/logo.png';
            }

            if ($request->hasFile('favicon')) {
                $faviconPath = public_path('assets/img/web/favicon.png');
                if (File::exists($faviconPath)) {
                    File::delete($faviconPath);
                }
                $request->file('favicon')->move(public_path('assets/img/web'), 'favicon.png');
                $webLogo->favicon = 'assets/img/web/favicon.png';
            }

            $webLogo->save();

            return back()->with('success', 'Logos updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while updating the logos.']);
        }
    }

    public function webInfoPage()
    {
        $webInfo = WebInfo::first();
        return view('v1.careepick.dashboard.admin.web-settings.web-info', compact('webInfo'));
    }

    public function webInfoUpdate(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'meta_author_name' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        try {
            $webInfo = WebInfo::first();

            $webInfo->update([
                'title' => $request->input('title'),
                'meta_author_name' => $request->input('meta_author_name'),
                'meta_description' => $request->input('meta_description'),
                'meta_keywords' => $request->input('meta_keywords'),
            ]);

            return back()->with('success', 'Information updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while updating the information.']);
        }
    }
}
