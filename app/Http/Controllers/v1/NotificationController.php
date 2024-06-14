<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function fetchNotifications()
    {
        if (isset(app('JobSeeker')->id)) {
            return redirect()->route('js.fetch.notifications');
        } else if (isset(app('JobProvider')->id)) {
            return redirect()->route('jp.fetch.notifications');
        }
    }

    public function markNotifications(Request $request)
    {
        $requestData = $request->all();
        if (isset(app('JobSeeker')->id)) {
            return redirect()->route('js.mark.notification.read', $requestData);
        } else if (isset(app('JobProvider')->id)) {
            return redirect()->route('jp.mark.notification.read', $requestData);
        }
    }
}
