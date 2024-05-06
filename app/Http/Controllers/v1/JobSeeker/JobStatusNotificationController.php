<?php

namespace App\Http\Controllers\v1\JobSeeker;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\JobApplicationStatusTracker;

class JobStatusNotificationController extends Controller
{
    /**
     * Fetch notifications for the current job seeker.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchNotifications()
    {
        $jobSeekerId = app('jobSeeker')->id; // Assuming you have authenticated job seeker
        // Log::debug($jobSeekerId);
        $notifications = JobApplicationStatusTracker::getNotificationdata($jobSeekerId);

        return response()->json(['notifications' => $notifications]);
    }

    /**
     * Mark a notification as read.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function markNotificationRead(Request $request)
    {
        try {
            $notificationId = $request->id;
            $notification = JobApplicationStatusTracker::find($notificationId);
            if ($notification) {
                $notification->read = true;
                $notification->save();

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Notification not found.']);
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
