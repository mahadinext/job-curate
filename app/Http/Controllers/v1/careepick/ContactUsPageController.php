<?php

namespace App\Http\Controllers\v1\careepick;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ContactUsPageController extends Controller
{
    /**
     * redirect to page with required data
     *
     * @return view
     */
    public function index(): view
    {
        try {
            $data = [];

            return view('v1.careepick.pages.common.contact-us', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function storeContactForm(Request $request)
    {
        try {
            ContactForm::create([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "subject" => $request->subject,
                "message" => $request->message,
            ]);

            return back()->with('success', 'Your message submitted successfully!');
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
