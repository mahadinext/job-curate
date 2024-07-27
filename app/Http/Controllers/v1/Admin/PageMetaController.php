<?php

namespace App\Http\Controllers\v1\Admin;

use App\Http\Controllers\Controller;
use App\Models\v1\careepick\PageMetaInfo;
use Illuminate\Http\Request;

class PageMetaController extends Controller
{
    protected $pages = [
        'home' => 'Home Page',
        'about-us' => 'About Page',
        'career' => 'Career Page',
        'contact-us' => 'Contact Us Page',
        'terms-policy' => 'Terms & Policy Page',
        // Add other pages as necessary
    ];

    public function index()
    {
        $pages = $this->pages;
        return view('v1.careepick.dashboard.admin.web-settings.meta.index', compact('pages'));
    }

    public function loadMetaInfo(Request $request)
    {
        $pageName = $request->input('page_name');
        $pageMeta = PageMetaInfo::where('page_name', $pageName)->first();
        return response()->json($pageMeta);
    }

    public function update(Request $request, $pageName)
    {
        $request->validate([
            'title' => 'nullable|string',
            'meta_author_name' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
        ]);

        PageMetaInfo::updateOrCreate(
            ['page_name' => $pageName],
            $request->only('title', 'meta_author_name', 'meta_description', 'meta_keywords')
        );

        return back()->with('success', 'Meta information updated successfully!');
    }
}
