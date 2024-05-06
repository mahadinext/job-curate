<?php

namespace App\Http\Controllers\v1\JobProvider;

use Exception;
use Pusher\Pusher;
use App\Models\Jobs;
use App\Models\AgeRange;
use App\Models\JobPlace;
use App\Models\JobNature;
use Illuminate\View\View;
use App\Models\SalaryType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\NewNotification;
use App\Models\ExperienceRange;
use App\Models\v1\careepick\Day;
use App\Models\JobRequiredSkills;
use Illuminate\Support\Facades\DB;
use App\Models\v1\careepick\Skills;
use Illuminate\Support\Facades\Log;
use App\Events\NewNotificationEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\v1\careepick\JobCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\JobApplicationStatusTracker;
use App\Mail\JobApplicationStatusUpdateMail;
use App\Models\v1\careepick\JobSeeker\JobSeeker;
use App\Http\Requests\JobProvider\JobPostRequest;
use App\Models\v1\careepick\JobApplicationStatus;
use App\Models\v1\careepick\JobSeeker\AppliedJobs;

class JobPostController extends Controller
{
    /**
     * Client form request container
     *
     * @var Request $request
     */
    private Request $request;

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function jobPostPage(): view
    {
        $jobCategoryData = JobCategory::all();
        $salaryTypeData = SalaryType::all();
        $ageRangeData = AgeRange::select("*")->get();
        $experienceRangeData = ExperienceRange::select("*")->get();
        $jobNatureData = JobNature::select("*")->get();
        $jobPlaceData = JobPlace::select("*")->get();
        $skillsData = Skills::getAllData();

        // dd($jobSeekerEducationsData);

        $data = [
            // 'schoolAndCollegeData' => $schoolAndCollegeData,
            // 'universitiesData' => $universitiesData,
            'jobCategoryData' => $jobCategoryData,
            'salaryTypeData' => $salaryTypeData,
            'ageRangeData' => $ageRangeData,
            'experienceRangeData' => $experienceRangeData,
            'jobNatureData' => $jobNatureData,
            'jobPlaceData' => $jobPlaceData,
            'skillsData' => $skillsData,
        ];

        return view('v1.careepick.dashboard.job-provider.post-job', $data);
    }

    public function addJobPost(Request $request)
    {
        try {
            // dd($request);
            $formRequest = new JobPostRequest();
            $requestData = $request->except('_token');
            // Validate the incoming request with the rules defined in rulesForCreate() method
            $validator = Validator::make($requestData, $formRequest->rulesForCreate(), $formRequest->messages());

            // Check if validation fails
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // dd($request);

            $data = $request->all();
            $data['company_id'] = app('jobProvider')->id;
            $data['slug'] = $this->generateSlug($data['job_title']);
            $skillSets = $data['skill_id'];

            unset($data['_token']);
            unset($data['skill_id']);
            // dd($data);

            $this->insertJobPost($data, $skillSets);

            return redirect()->back()->with('add-job-post-message', "Job post added successfully");
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function insertJobPost(array $data, $skillSets)
    {
        try {
            DB::transaction(function () use ($data, $skillSets) {
                // Instantiate a new Company model
                $jobPost = new Jobs();

                // Fill the model with data from the $data array
                $jobPost->fill($data);

                // Save the model to persist the data in the database
                $jobPost->save();
                // dd($jobPost);

                JobRequiredSkills::addSkills($jobPost->id, $skillSets);
            });

            // Both queries were successful
            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // Something went wrong, so Roll back the transaction
            DB::rollBack();
            Log::error($e);
        }
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function manageAllJobPostsPage(): view
    {
        $jobsData = Jobs::getJobsByCompany(app('jobProvider')->id);
        // dd($jobsData);

        return view('v1.careepick.dashboard.job-provider.manage-jobs', ['jobsData' => $jobsData]);
    }

    /**
     * redirect to desired page with required data
     *
     * @return view
     */
    public function manageAllApplications(): view
    {
        $applicationsData = AppliedJobs::getJobApplicationsForEmployer(app('jobProvider')->id);
        $jobApplicationStatusData = JobApplicationStatus::all();
        $daysData = Day::select('*')->get();
        $data = [
            'jobsData' => $applicationsData,
            'jobApplicationStatusData' => $jobApplicationStatusData,
            'daysData' => $daysData,
        ];

        // broadcast(new NewNotification('New notification message'));
        // event(new NewNotification('hello world'));
        // $message = "New notification message";
        // event(new NewNotificationEvent($message));

        return view('v1.careepick.dashboard.job-provider.manage-applications', $data);
    }

    public function singleJobApplications($jobSlug): view
    {
        $applicationsData = AppliedJobs::getJobApplicationsForEmployer(app('jobProvider')->id, $jobSlug);
        $jobApplicationStatusData = JobApplicationStatus::all();
        $daysData = Day::select('*')->get();
        $data = [
            'jobsData' => $applicationsData,
            'jobApplicationStatusData' => $jobApplicationStatusData,
            'daysData' => $daysData,
        ];

        // broadcast(new NewNotification('New notification message'));
        // event(new NewNotification('hello world'));
        // $message = "New notification message";
        // event(new NewNotificationEvent($message));

        return view('v1.careepick.dashboard.job-provider.single-job-applications', $data);
    }

    public function jobApplicationEditPage($jobSlug): view
    {
        try {
            $jobsData = Jobs::getJobDetail($jobSlug, $jobId = null);
            $jobCategoryData = JobCategory::all();
            $salaryTypeData = SalaryType::all();
            $ageRangeData = AgeRange::select("*")->get();
            $experienceRangeData = ExperienceRange::select("*")->get();
            $jobNatureData = JobNature::select("*")->get();
            $jobPlaceData = JobPlace::select("*")->get();
            $skillsData = Skills::getAllData();
            // dd($jobsData);
            $data = [
                'jobCategoryData' => $jobCategoryData,
                'salaryTypeData' => $salaryTypeData,
                'ageRangeData' => $ageRangeData,
                'experienceRangeData' => $experienceRangeData,
                'jobNatureData' => $jobNatureData,
                'jobPlaceData' => $jobPlaceData,
                'skillsData' => $skillsData,
                'jobsData' => $jobsData,
            ];

            return view('v1.careepick.dashboard.job-provider.edit-job', $data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function jobApplicationUpdate(Request $request)
    {
        try {
            // dd($request);
            $formRequest = new JobPostRequest();
            $requestData = $request->except('_token', 'job_id');
            // Validate the incoming request with the rules defined in rulesForCreate() method
            $validator = Validator::make($requestData, $formRequest->rulesForCreate(), $formRequest->messages());

            // Check if validation fails
            if ($validator->fails()) {
                // dd($validator);
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $updateSkills = $this->updateJobRequiredSkills($request);

            // return redirect()->back()->with('add-job-post-message', "Job post added successfully");

            $job = Jobs::where('id', $request->job_id)->first();
            if ($job) {
                $job->job_title = $request->job_title;
                $job->job_category_id = $request->job_category_id;
                $job->vacancy = $request->vacancy;
                $job->salary_type_id = $request->salary_type_id;
                $job->salary = $request->salary;
                $job->age_id = $request->age_id;
                $job->experience_id = $request->experience_id;
                $job->deadline = $request->deadline;
                $job->education = $request->education;
                $job->experience_requirments = $request->experience_requirments;
                $job->additional_requirments = $request->additional_requirments;
                $job->responsibilities = $request->responsibilities;
                $job->compensation_benefits = $request->compensation_benefits;
                $job->job_highlights = $request->job_highlights;
                $job->job_nature = $request->job_nature;
                $job->job_place = $request->job_place;
                $job->job_location = $request->job_location;
                $job->job_status = $request->job_status;

                $changesToSave = $this->checkForDirtyData($job);
                if (!empty($changesToSave)) {
                    Jobs::where('id', $request->job_id)->update($changesToSave);
                    return redirect()->route('manage-jobs')->with('manage-job-message', "Job " . $job->job_title . " updated successfully");
                } else if ($updateSkills) {
                    return redirect()->route('manage-jobs')->with('manage-job-message', "Job " . $job->job_title . " updated successfully");
                } else {
                    return redirect()->back();
                }
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    private function updateJobRequiredSkills($request)
    {
        try {
            $existingSkillIds = JobRequiredSkills::where('job_id', $request->job_id)->pluck('skill_id')->toArray();
            $skillSets = $request->skill_id;

            // Identify the skill_ids that are in $skillSets but not in $existingSkillIds
            $skillsToAdd = array_diff($skillSets, $existingSkillIds);

            // Identify the skill_ids that are in $existingSkillIds but not in $skillSets
            $skillsToRemove = array_diff($existingSkillIds, $skillSets);

            // Remove the skills that are no longer needed
            if (!empty($skillsToRemove)) {
                JobRequiredSkills::where('job_id', $request->job_id)
                                ->whereIn('skill_id', $skillsToRemove)
                                ->delete();
            }
            $insertQuery = false;

            // Add the new skills
            if (!empty($skillsToAdd)) {
                $newSkills = [];
                foreach ($skillsToAdd as $skillId) {
                    $newSkills[] = ['job_id' => $request->job_id, 'skill_id' => $skillId];
                }
                $insertQuery = JobRequiredSkills::insert($newSkills);
            }

            return $insertQuery;
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function jobApplicationDelete($jobSlug)
    {
        $jobsData = Jobs::where('slug', $jobSlug)->delete();
        // dd($jobsData);

        return redirect()->back()->with('manage-job-message', "Job deleted successfully");
    }

    public function fetchJobApplicationStatus(Request $request)
    {
        try {
            $jobApplicationStatus = JobApplicationStatus::all();
            $appliedJobs = AppliedJobs::find($request->id);
            $statusTracker = JobApplicationStatusTracker::getInfo($appliedJobs->job_id, $appliedJobs->js_id, $appliedJobs->job_application_status);
            $data = [
                'jobApplicationStatus' => $jobApplicationStatus,
                'statusTracker' => $statusTracker,
            ];

            return response()->json($data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function updateJobApplicationStatus(Request $request)
    {
        try {
            // dd($request);
            $this->request = $request;
            DB::transaction(function () {
                $appliedJobs = AppliedJobs::find($this->request->id);
                $appliedJobs->job_application_status = $this->request->status_id;

                // Check if any values have changed and are not null
                $changesToSave = $this->checkForDirtyData($appliedJobs);
                // Log::info(json_encode($changesToSave));

                // Update the category only if there are changes to save
                if (!empty($changesToSave)) {
                    $updateAppliedJobs = AppliedJobs::where('id', $this->request->id)->update($changesToSave);
                }

                $appliedJobs = AppliedJobs::find($this->request->id);
                $statusTracker = JobApplicationStatusTracker::where('job_id', $appliedJobs->job_id)
                                        ->where('js_id', $appliedJobs->js_id)
                                        ->where('job_application_status', $this->request->status_id)->first();
                if ($statusTracker) {
                    $statusTracker->scheduled_day = $this->request->schedule_day_id;
                    $statusTracker->scheduled_date = $this->request->schedule_date;
                    $statusTracker->scheduled_time = $this->request->schedule_time;
                    $statusTracker->scheduled_location = $this->request->scheduled_location;
                    $statusTracker->scheduled_address = $this->request->offline_address;
                    $statusTracker->scheduled_url = $this->request->online_address;
                    $statusTracker->required_documents = $this->request->required_documents;

                    $changesToSave = $this->checkForDirtyData($statusTracker);
                    if (!empty($changesToSave)) {
                        JobApplicationStatusTracker::where('id', $statusTracker->id)->update($changesToSave);
                    }
                } else {
                    JobApplicationStatusTracker::create([
                        'job_id' => $appliedJobs->job_id,
                        'js_id' => $appliedJobs->js_id,
                        'company_id' => $appliedJobs->company_id,
                        'job_application_status' => $this->request->status_id,
                        'scheduled_day' => $this->request->schedule_day_id,
                        'scheduled_date' => $this->request->schedule_date,
                        'scheduled_time' => $this->request->schedule_time,
                        'scheduled_location' => $this->request->scheduled_location,
                        'scheduled_address' => $this->request->offline_address,
                        'scheduled_url' => $this->request->online_address,
                        'required_documents' => $this->request->required_documents,
                    ]);
                }
                $this->sendMail($appliedJobs, $this->request);
            });

            return redirect()->back()->with('applicationStatusUpdateMsg', "Status updated successfully");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $response = [
                'status' => 400,
                'responseData' => null,
                'message' => $e->getMessage(),
            ];
            return response()->json($response);
        }
    }

    private function sendMail($appliedJobs, $request)
    {
        $jobSeekerData = JobSeeker::where('id', $appliedJobs->js_id)->first();
        $jobData = Jobs::getJobDetail(null, $appliedJobs->job_id);
        $statusTrackerData = JobApplicationStatusTracker::getInfo($appliedJobs->job_id, $appliedJobs->js_id, $request->status_id);
        $mailData = [
            'jobSeekerData' => $jobSeekerData,
            'jobData' => $jobData,
            'statusTrackerData' => $statusTrackerData,
        ];
        Mail::to($jobSeekerData->jobseeker_mail)->send(new JobApplicationStatusUpdateMail($mailData));
    }

    private function checkForDirtyData($model)
    {
        $changes = $model->getDirty();
        $changesToSave = [];

        foreach ($changes as $attribute => $value) {
            if ($value !== null && !empty($value)) {
                $changesToSave[$attribute] = $value;
            }
        }

        return $changesToSave;
    }

    /**
     * Generate slug
     *
     * @param string $value
     * @return string
     */
    private function generateSlug(string $value): string
    {
        $slug = Str::slug($value);
        // dd($slug,"show");

        if (Jobs::where('slug', Str::slug($value))->exists()) {
            $original = $slug;

            $count = 1;

            while (Jobs::where('slug', $slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        return $slug;
    }
}
