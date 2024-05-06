<?php

namespace App\Http\Controllers\v1\JobSeeker;

use File;
use Exception;
use Carbon\Carbon;
use Dompdf\Dompdf;
// use Illuminate\Http\File;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\v1\careepick\Year;
use App\Models\v1\careepick\Month;
use Illuminate\Support\Facades\DB;
use App\Models\v1\careepick\Skills;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\v1\careepick\Languages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\v1\careepick\Universities;
use App\Models\v1\careepick\EducationLevels;
use App\Models\v1\careepick\SchoolAndCollege;
use App\Models\v1\careepick\EducationSubjects;
use App\Models\v1\careepick\EducationResultType;
use App\Models\v1\careepick\JobSeeker\JobSeeker;
use App\Models\v1\careepick\EducationDegreeTitle;
use App\Models\v1\careepick\JobSeeker\JobSeekerSkills;
use App\Models\v1\careepick\JobSeeker\JobSeekerLanguages;
use App\Models\v1\careepick\JobSeeker\JobSeekerEducations;
use App\Models\v1\careepick\JobSeeker\JobSeekerExperiences;
use App\Models\v1\careepick\JobSeeker\JobSeekerCertifications;
use App\Models\v1\careepick\JobSeeker\JobSeekerResearchPapers;

class ResumeBuilderController extends Controller
{
    private $months = [
        'January' => 1,
        'February' => 2,
        'March' => 3,
        'April' => 4,
        'May' => 5,
        'June' => 6,
        'July' => 7,
        'August' => 8,
        'September' => 9,
        'October' => 10,
        'November' => 11,
        'December' => 12,
    ];

    public function showResume($jobSeekerId = null)
    {
        $data = $this->getNecessaryData($jobSeekerId);
        // dd($data);

        return view('v1.careepick.dashboard.job-seeker.resume', $data);
    }

    public function downloadResume($applicantsId = null)
    {
        try {
            $data = $this->getNecessaryData($applicantsId);

            $html = view('v1.careepick.dashboard.job-seeker.resume', $data)->render();

            // Instantiate Dompdf
            $dompdf = new Dompdf();

            // Load HTML content
            $dompdf->loadHtml($html);

            // Render PDF
            $dompdf->render();

            // Generate a unique filename
            $filename = 'resume_' . time() . '.pdf';

            // Get the PDF content
            $pdfContent = $dompdf->output();

            return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function viewResume($applicantsId = null, $fileName = null)
    {
        try {
            $data = $this->getNecessaryData($applicantsId);

            $html = view('v1.careepick.dashboard.job-seeker.resume', $data)->render();

            // Instantiate Dompdf
            $dompdf = new Dompdf();

            // Load HTML content
            $dompdf->loadHtml($html);

            // Render PDF
            $dompdf->render();

            // Get the PDF content
            $pdfContent = $dompdf->output();

            // // Set the PDF name
            // $pdfName = 'resume.pdf';

            // // Embed the PDF content into an HTML page
            // $pdfEmbed = base64_encode($pdfContent);

            // // Return the view with the embedded PDF content
            // return view('v1.careepick.dashboard.job-seeker.viewable-pdf', compact('pdfEmbed', 'pdfName'));

            return response($pdfContent)
            ->header('Content-Type', 'application/pdf');
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * redirect to home page with required data
     *
     * @return view
     */
    public function myResumePage(): view
    {
        // $schoolAndCollegeData = SchoolAndCollege::getAllSchoolAndCollegeData();
        // $universitiesData = Universities::getAllUniversitiesData();
        $educationLevelsData = EducationLevels::all();
        $educationDegreeTitleData = EducationDegreeTitle::select("*")->get();
        $educationSubjectsData = EducationSubjects::select("*")->get();
        $educationResultTypeData = EducationResultType::select("*")->get();
        $yearsData = Year::select("*")->get();
        $monthsData = Month::select("*")->get();
        $languagesData = Languages::select("*")->get();
        $skillsData = Skills::getAllData();

        $data = $this->getNecessaryData();
        $data['educationLevelsData'] = $educationLevelsData;
        $data['educationResultTypeData'] = $educationResultTypeData;
        $data['educationDegreeTitleData'] = $educationDegreeTitleData;
        $data['educationSubjectsData'] = $educationSubjectsData;
        $data['yearsData'] = $yearsData;
        $data['monthsData'] = $monthsData;
        $data['languagesData'] = $languagesData;
        $data['skillsData'] = $skillsData;

        return view('v1.careepick.dashboard.job-seeker.resume-builder', $data);
    }

    private function getNecessaryData($jobSeekerId = null)
    {
        $jobSeekerId = ($jobSeekerId != null) ? $jobSeekerId : app('jobSeeker')->id;
        if (isset(app('jobSeeker')->id)) {
            $jobSeekerData = JobSeeker::select("*")->where('user_id', Auth::user()->id)->get();
        } else {
            $jobSeekerData = JobSeeker::select("*")->where('id', $jobSeekerId)->get();
        }
        // $jobSeekerData->transform(function ($jobSeeker) {
        //     if ($jobSeeker->jobseeker_dob != null) {
        //         dd($jobSeeker->jobseeker_dob);
        //         $jobSeeker->formatted_dob = Carbon::createFromFormat('m/d/Y', $jobSeeker->jobseeker_dob)->format('Y-m-d');
        //     }
        //     return $jobSeeker;
        // });
        $jobSeekerSkillsData = JobSeekerSkills::with(['skills'])->where('job_seeker_id', $jobSeekerId)->get();
        $jobSeekerLanguagesData = JobSeekerLanguages::with(['language'])->where('job_seeker_id', $jobSeekerId)->get();
        $jobSeekerResearchPapersData = JobSeekerResearchPapers::select("*")->where('job_seeker_id', $jobSeekerId)->get();
        $jobSeekerCertificationData = JobSeekerCertifications::select("*")->where('job_seeker_id', $jobSeekerId)->get();
        $jobSeekerExperiencesData = JobSeekerExperiences::select("*")->where('job_seeker_id', $jobSeekerId)->get();

        $jobSeekerExperiencesData->transform(function ($item) {
            $startingTime = $item->start_month . ", " . $item->start_year;
            if ($item->end_year != null) {
                $endingTime = $item->end_month . ", " . $item->end_year;
            } else {
                $endingTime = "present";
            }
            $workingTime = $startingTime . " - " . $endingTime;
            $workingDuration = $this->calculateDuration($item->start_month, $item->start_year, $item->end_month, $item->end_year);

            $item->workingTime = $workingTime;
            $item->workingDuration = $workingDuration;

            return $item;
        });

        $jobSeekerEducationsData = JobSeekerEducations::with([
            'educationLevel',
            'educationDegreeTitle',
            'educationSubject',
            // Include other relationships as needed
        ])->where('job_seeker_id', $jobSeekerId)->get();

        $jobSeekerEducationsData->transform(function ($item) {
            $level_name = $item->educationLevel->level_name;
            $level_icon = '';

            if ($item->school_name != null) {
                $institute_name = $item->school_name;
            } elseif ($item->college_name != null) {
                $institute_name = $item->college_name;
            } elseif ($item->madrasha_name != null) {
                $institute_name = $item->madrasha_name;
            } elseif ($item->university_name != null) {
                $institute_name = $item->university_name;
            }

            switch ($level_name) {
                case 'PSC/5 pass':
                    $level_icon = 'P';
                    break;
                case 'JSC/JDC/8 pass':
                    $level_icon = 'J';
                    break;
                case 'Secondary':
                    $level_icon = 'S';
                    break;
                case 'Higher Secondary':
                    $level_icon = 'H';
                    break;
                case 'Diploma':
                    $level_icon = 'D';
                    break;
                case 'Bachelor':
                    $level_icon = 'B';
                    break;
                case 'Master':
                    $level_icon = 'M';
                    break;
                case 'Ph.D.':
                    $level_icon = 'Ph.D';
                    break;
                    // Add more cases as needed
                default:
                    $level_icon = '';
            }

            // Add level_icon attribute to the educationLevel object
            $item->educationLevel->level_icon = $level_icon;
            $item->institute_name = $institute_name;

            return $item;
        });
        // dd($jobSeekerEducationsData);

        $data = [
            'jobSeekerData' => $jobSeekerData,
            'jobSeekerEducationsData' => $jobSeekerEducationsData,
            'jobSeekerExperiencesData' => $jobSeekerExperiencesData,
            'jobSeekerCertificationData' => $jobSeekerCertificationData,
            'jobSeekerResearchPapersData' => $jobSeekerResearchPapersData,
            'jobSeekerLanguagesData' => $jobSeekerLanguagesData,
            'jobSeekerSkillsData' => $jobSeekerSkillsData,
        ];

        return $data;
    }

    private function calculateDuration($startMonth, $startYear, $endMonth, $endYear)
    {
        // Convert month names to numeric values
        $startMonthNumeric = $this->months[$startMonth];
        $endMonthNumeric = $endMonth ? $this->months[$endMonth] : date('n'); // Use current month if endMonth is null
        $endYear = $endYear ?? date('Y'); // Use current year if endYear is null

        // Calculate the total number of months
        $totalMonths = ($endYear - $startYear) * 12 + ($endMonthNumeric - $startMonthNumeric) + 1;

        // Calculate years and months
        $years = floor($totalMonths / 12);
        $months = $totalMonths % 12;

        return $years . "y " . $months . "m";

        return [
            'years' => $years,
            'months' => $months,
        ];
    }

    public function fetchRequiredEducationData(Request $request)
    {
        try {
            switch ($request->requestedData) {
                case ('education-level-degree'):
                    $data = EducationDegreeTitle::where('education_level_id', $request->educationLevelId)->get();
                    $formattedResponse = $this->formatResponse($data);
                    break;
                case ('school-college-university'):
                    if ($request->institutionType == "1") {
                        $data = SchoolAndCollege::getAllDataByInstitutionType('School', 'School and College');
                    } else if ($request->institutionType == "2") {
                        $data = SchoolAndCollege::getAllDataByInstitutionType('College', 'School and College');
                    } else if ($request->institutionType == "3") {
                        $data = SchoolAndCollege::getAllDataByInstitutionType('Madrasha');
                    } else if ($request->institutionType == "4") {
                        $data = Universities::getAllUniversitiesData();
                    }
                    $formattedResponse = $this->formatResponse($data);
                    break;
                case ('exam-degree-titles'):
                    $data = EducationDegreeTitle::select('*')->get();
                    $formattedResponse = $this->formatResponse($data);
                    break;
                case ('major-subjects'):
                    $data = EducationSubjects::select("*")->get();
                    $formattedResponse = $this->formatResponse($data);
                    break;
                default:
                    $formattedResponse = [
                        'status' => 400,
                        'responseData' => null,
                        'message' => 'Something went wrong.',
                    ];
            }
            // $degreeTitles = EducationDegreeTitle::where('education_level_id', $educationLevelId)->get();
            return response()->json($formattedResponse);
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

    private function formatResponse($data)
    {
        if ($data) {
            $response = [
                'status' => 200,
                'responseData' => $data,
            ];
        } else {
            $response = [
                'status' => 400,
                'responseData' => null,
                'message' => 'No Data found',
            ];
        }

        return $response;
    }

    public function addGeneralInfo(Request $request)
    {
        try {
            // dd($request);
            // Get the JobSeeker instance
            $jobSeeker = JobSeeker::findOrFail($request->input('jobseeker_id'));

            // Get the old values
            $oldValues = $jobSeeker->toArray();

            // Get the new values from the request
            $newValues = $request->only([
                'jobseeker_name',
                'jobseeker_mail',
                'jobseeker_dob',
                'jobseeker_religion',
                'jobseeker_gender',
                'jobseeker_marital_status',
                'jobseeker_phone_no_1',
                'jobseeker_phone_no_2',
                'jobseeker_nid_no',
                'jobseeker_address',
                'jobseeker_career_summary'
            ]);

            // Compare old values with new values and update only the changed fields
            foreach ($newValues as $key => $newValue) {
                if ($newValue !== $oldValues[$key]) {
                    $jobSeeker->$key = $newValue;
                }
            }

            if ($request->hasfile('jobseeker_image')) {
                $file = $request->jobseeker_image;
                $filePath = $this->getPathForUploadedFile($file);
                $jobSeeker->jobseeker_image = $filePath;
            }

            // Save the changes
            $jobSeeker->save();

            // Redirect back or wherever you want
            return redirect()->back()->with('success', 'General info updated successfully');

            $jobSeekerArray = [
                'job_seeker_id' => app('jobSeeker')->id,
                'organization_name' => $request->organization_name,
                'designation' => $request->designation,
                'responsibilities' => $request->working_responsibilities,
                'start_month' => $request->from_month,
                'start_year' => $request->from_year,
            ];

            if ($request->currently_working != 1) {
                $jobSeekerArray['end_month'] = $request->to_month;
                $jobSeekerArray['end_year'] = $request->to_year;
            } else {
                $jobSeekerArray['currently_working'] = "yes";
            }

            JobSeeker::create($jobSeekerArray);
            return redirect()->back()->with('add-work-xp-message', "Work experience added successfully");
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    /**
     * Get path for uploaded files
     *
     * @param object $file
     * @return string
     */
    private function getPathForUploadedFile(object $file): string
    {
        $fileExtension = $file->extension();
        $fileExtension = strtolower($file->getClientOriginalExtension());
        $fileName = "profile_image." . $fileExtension;

        $path = public_path('dashboard/assets/images/job-seeker/' . app('jobSeeker')->id);

        $this->createDirectory($path);

        // ResizeImage::make($file)->resize(300, 200)->save(public_path($filePath));
        if ($file->move($path, $fileName)) {
            $filePath = 'dashboard/assets/images/job-seeker/' . app('jobSeeker')->id . '/' . $fileName;
        }

        return $filePath;
    }

    /**
     * Create directory if not exist
     *
     * @param string $path
     * @return void
     */
    private function createDirectory(string $path): void
    {
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }

    public function addSkills(Request $request)
    {
        try {
            // dd($request);
            $request->validate([
                'skill_id' => 'required|array',
                'skill_id.*' => 'exists:skills,id', // Assuming 'skills' is the table name for skills
                // Add other validation rules if needed
            ]);

            JobSeekerSkills::where('job_seeker_id', app('jobSeeker')->id)->delete();

            // Call the addSkills method to save the skills
            JobSeekerSkills::addSkills([
                'job_seeker_id' => app('jobSeeker')->id, // Assuming you're storing the job seeker ID in the session
                'skill_id' => $request->skill_id,
                // Add other attributes if needed
            ]);

            // Redirect back with a success message or any other response
            return redirect()->back()->with('add-skill-message', 'Skills added successfully.');
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function addWorkExperience(Request $request)
    {
        try {
            // dd($request);
            if (isset($request->experience_id)) {
                $jobSeekerExperiences = JobSeekerExperiences::where('id', $request->experience_id)->first();
                if ($jobSeekerExperiences) {
                    $jobSeekerExperiences->organization_name = $request->organization_name;
                    $jobSeekerExperiences->designation = $request->designation;
                    $jobSeekerExperiences->responsibilities = $request->working_responsibilities;
                    $jobSeekerExperiences->start_month = $request->from_month;
                    $jobSeekerExperiences->start_year = $request->from_year;
                    if ($request->currently_working != 1) {
                        $jobSeekerExperiences->end_month = $request->to_month;
                        $jobSeekerExperiences->end_year = $request->to_year;
                    } else {
                        $jobSeekerExperiences->currently_working = "yes";
                    }

                    $changesToSave = $this->checkForDirtyData($jobSeekerExperiences);
                    if (!empty($changesToSave)) {
                        JobSeekerExperiences::where('id', $request->experience_id)->update($changesToSave);
                        return redirect()->back()->with('add-work-xp-message', "Work experience updated successfully");
                    }
                    return redirect()->back();
                }
            } else {
                $jobSeekerWorkExperienceArray = [
                    'job_seeker_id' => app('jobSeeker')->id,
                    'organization_name' => $request->organization_name,
                    'designation' => $request->designation,
                    'responsibilities' => $request->working_responsibilities,
                    'start_month' => $request->from_month,
                    'start_year' => $request->from_year,
                ];

                if ($request->currently_working != 1) {
                    $jobSeekerWorkExperienceArray['end_month'] = $request->to_month;
                    $jobSeekerWorkExperienceArray['end_year'] = $request->to_year;
                } else {
                    $jobSeekerWorkExperienceArray['currently_working'] = "yes";
                }

                JobSeekerExperiences::create($jobSeekerWorkExperienceArray);
                return redirect()->back()->with('add-work-xp-message', "Work experience added successfully");
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function fetchSpecificExperienceData(Request $request)
    {
        try {
            // $data = JobSeekerExperiences::where('id', $request->id)->first();
            $data = DB::table('job_seeker_experiences')
                        ->where('id', $request->id)
                        ->first();

            return response()->json($data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function deleteWorkXpData($id)
    {
        try {
            JobSeekerExperiences::where('id', $id)->delete();
            return redirect()->back()->with('add-work-xp-message', "Work experience deleted successfully");
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function addCertification(Request $request)
    {
        try {
            if (isset($request->certification_id)) {
                $jobSeekerCertifications = JobSeekerCertifications::where('id', $request->certification_id)->first();
                if ($jobSeekerCertifications) {
                    $jobSeekerCertifications->certification_name = $request->certification_name;
                    $jobSeekerCertifications->certification_institution = $request->certification_institution;
                    $jobSeekerCertifications->certification_score = $request->certification_score;
                    $jobSeekerCertifications->certified_month = $request->certified_month;
                    $jobSeekerCertifications->certified_year = $request->certified_year;
                    $jobSeekerCertifications->certification_expiry_date = $request->certification_expiry_date;

                    $changesToSave = $this->checkForDirtyData($jobSeekerCertifications);
                    if (!empty($changesToSave)) {
                        JobSeekerCertifications::where('id', $request->certification_id)->update($changesToSave);
                        return redirect()->back()->with('add-certification-message', "Certification updated successfully");
                    }
                    return redirect()->back();
                }
            } else {
                $jobSeekerCertificationArray = [
                    'job_seeker_id' => app('jobSeeker')->id,
                    'certification_name' => $request->certification_name,
                    'certification_institution' => $request->certification_institution,
                    'certification_score' => $request->certification_score,
                    'certified_month' => $request->certified_month,
                    'certified_year' => $request->certified_year,
                    'certification_expiry_date' => $request->certification_expiry_date,
                ];

                JobSeekerCertifications::create($jobSeekerCertificationArray);
                return redirect()->back()->with('add-certification-message', "Certification added successfully");
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function fetchSpecificCertificationData(Request $request)
    {
        try {
            $data = JobSeekerCertifications::where('id', $request->id)->first();
            return response()->json($data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function deleteCertificationData($id)
    {
        try {
            JobSeekerCertifications::where('id', $id)->delete();
            return redirect()->back()->with('add-certification-message', "Certificate deleted successfully");
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function addPublications(Request $request)
    {
        try {
            if (isset($request->publication_id)) {
                $jobSeekerResearchPapers = JobSeekerResearchPapers::where('id', $request->publication_id)->first();
                if ($jobSeekerResearchPapers) {
                    $jobSeekerResearchPapers->research_paper_subject = $request->research_paper_subject;
                    $jobSeekerResearchPapers->research_paper_summary = $request->research_paper_summary;
                    $jobSeekerResearchPapers->research_paper_url = $request->research_paper_url;

                    $changesToSave = $this->checkForDirtyData($jobSeekerResearchPapers);
                    if (!empty($changesToSave)) {
                        JobSeekerResearchPapers::where('id', $request->publication_id)->update($changesToSave);
                        return redirect()->back()->with('add-publications-message', "Research paper updated successfully");
                    }
                    return redirect()->back();
                }
            } else {
                $jobSeekerPublicationsArray = [
                    'job_seeker_id' => app('jobSeeker')->id,
                    'research_paper_subject' => $request->research_paper_subject,
                    'research_paper_summary' => $request->research_paper_summary,
                    'research_paper_url' => $request->research_paper_url,
                ];

                JobSeekerResearchPapers::create($jobSeekerPublicationsArray);
                return redirect()->back()->with('add-publications-message', "Research paper added successfully");
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function fetchSpecificPublicationsData(Request $request)
    {
        try {
            $data = JobSeekerResearchPapers::where('id', $request->id)->first();
            return response()->json($data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function deletePublicationsData($id)
    {
        try {
            JobSeekerResearchPapers::where('id', $id)->delete();
            return redirect()->back()->with('add-publications-message', "Research paper deleted successfully");
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function addLangugaes(Request $request)
    {
        try {
            if (isset($request->js_language_id)) {
                $jobSeekerLanguages = JobSeekerLanguages::where('id', $request->js_language_id)->first();
                if ($jobSeekerLanguages) {
                    $jobSeekerLanguages->language_id = $request->language_id;
                    $jobSeekerLanguages->proficiency = $request->proficiency;

                    $changesToSave = $this->checkForDirtyData($jobSeekerLanguages);
                    if (!empty($changesToSave)) {
                        JobSeekerLanguages::where('id', $request->js_language_id)->update($changesToSave);
                        return redirect()->back()->with('add-languages-message', "Language updated successfully");
                    }
                    return redirect()->back();
                }
            } else {
                $jobSeekerLangugaesArray = [
                    'job_seeker_id' => app('jobSeeker')->id,
                    'language_id' => $request->language_id,
                    'proficiency' => $request->proficiency,
                ];

                JobSeekerLanguages::create($jobSeekerLangugaesArray);
                return redirect()->back()->with('add-languages-message', "Language added successfully");
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function fetchSpecificLangugaesData(Request $request)
    {
        try {
            $data = JobSeekerLanguages::where('id', $request->id)->first();
            return response()->json($data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function deleteLangugaesData($id)
    {
        try {
            JobSeekerLanguages::where('id', $id)->delete();
            return redirect()->back()->with('add-languages-message', "Language deleted successfully");
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function addEducation(Request $request)
    {
        try {
            if (isset($request->education_id)) {
                $jobSeekerEducations = JobSeekerEducations::where('id', $request->education_id)->first();
                if ($jobSeekerEducations) {
                    $jobSeekerEducations->education_level_id = $request->education_level;
                    $jobSeekerEducations->education_subjects_id = $request->major_subject;
                    $jobSeekerEducations->education_board = $request->education_board;
                    $jobSeekerEducations->education_institute_type_id = $request->institution_type;
                    $jobSeekerEducations->education_result_type_id = $request->result_type;
                    $jobSeekerEducations->year_of_passing = $request->exam_passing_year;

                    if ($request->exam_degree_title != null) {
                        $jobSeekerEducations->education_degree_title_id = $request->exam_degree_title;
                    } else {
                        $jobSeekerEducations->education_degree_title = $request->exam_degree_title_1;
                    }

                    if ($request->institution_type == "1") {
                        $jobSeekerEducations->school_name = $request->institution_name;
                    } else if ($request->institution_type == "2") {
                        $jobSeekerEducations->college_name = $request->institution_name;
                    } else if ($request->institution_type == "3") {
                        $jobSeekerEducations->madrasha_name = $request->institution_name;
                    } else if ($request->institution_type == "4") {
                        $jobSeekerEducations->university_name = $request->institution_name;
                    }

                    if ($request->exam_marks != null) {
                        $jobSeekerEducations->marks = $request->exam_marks;
                    } else {
                        $jobSeekerEducations->cgpa = $request->exam_cgpa;
                        $jobSeekerEducations->scale = $request->grade_scale;
                    }

                    $changesToSave = $this->checkForDirtyData($jobSeekerEducations);
                    if (!empty($changesToSave)) {
                        JobSeekerEducations::where('id', $request->education_id)->update($changesToSave);
                        return redirect()->route('resume-builder-page')->with('add-education-message', "Education updated successfully");
                    }
                    return redirect()->back();
                }
            } else {
                $jobSeeker = JobSeeker::where('user_id', Auth::user()->id)->first();

                $jobSeekerEducationsArray = [
                    'job_seeker_id' => $jobSeeker->id,
                    'education_level_id' => $request->education_level,
                    'education_subjects_id' => $request->major_subject,
                    'education_board' => $request->education_board,
                    'education_institute_type_id' => $request->institution_type,
                    'education_result_type_id' => $request->result_type,
                    'year_of_passing' => $request->exam_passing_year
                ];

                if ($request->exam_degree_title != null) {
                    $jobSeekerEducationsArray['education_degree_title_id'] = $request->exam_degree_title;
                } else {
                    $jobSeekerEducationsArray['education_degree_title'] = $request->exam_degree_title_1;
                }

                if ($request->institution_type == "1") {
                    $jobSeekerEducationsArray['school_name'] = $request->institution_name;
                } else if ($request->institution_type == "2") {
                    $jobSeekerEducationsArray['college_name'] = $request->institution_name;
                } else if ($request->institution_type == "3") {
                    $jobSeekerEducationsArray['madrasha_name'] = $request->institution_name;
                } else if ($request->institution_type == "4") {
                    $jobSeekerEducationsArray['university_name'] = $request->institution_name;
                }

                if ($request->exam_marks != null) {
                    $jobSeekerEducationsArray['marks'] = $request->exam_marks;
                } else {
                    $jobSeekerEducationsArray['cgpa'] = $request->exam_cgpa;
                    $jobSeekerEducationsArray['scale'] = $request->grade_scale;
                }

                $response = JobSeekerEducations::create($jobSeekerEducationsArray);
                // dd($response);
                return redirect()->back()->with('add-education-message', "Education added successfully");
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function fetchSpecificEducationData($id)
    {
        try {
            $jsEducationData = JobSeekerEducations::where('id', $id)->get();
            $educationLevelsData = EducationLevels::all();
            $educationDegreeTitleData = EducationDegreeTitle::select("*")->get();
            $educationSubjectsData = EducationSubjects::select("*")->get();
            $educationResultTypeData = EducationResultType::select("*")->get();
            $yearsData = Year::select("*")->get();
            $monthsData = Month::select("*")->get();
            $data = [
                'jsEducationData' => $jsEducationData,
                'educationLevelsData' => $educationLevelsData,
                'educationDegreeTitleData' => $educationDegreeTitleData,
                'educationSubjectsData' => $educationSubjectsData,
                'educationResultTypeData' => $educationResultTypeData,
                'yearsData' => $yearsData,
                'monthsData' => $monthsData,
            ];
            return view('v1.careepick.dashboard.job-seeker.resume.update.education', $data);
            // return response()->json($data);
        } catch (Exception $e) {
            Log::error($e);
        }
    }

    public function deleteEducationData($id)
    {
        try {
            JobSeekerEducations::where('id', $id)->delete();
            return redirect()->back()->with('add-education-message', "Education deleted successfully");
        } catch (Exception $e) {
            Log::error($e);
        }
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
     * Fetch updated table data
     *
     * @param string $tableSecretKey
     * @param string $firstKeyValue
     * @return string
     */
    private function generateSlug(string $requestModel, string $firstKeyValue): string
    {
        $slug = Str::slug($firstKeyValue);
        // dd($slug,"show");

        if ($requestModel::where('slug', Str::slug($firstKeyValue))->exists()) {
            $original = $slug;

            $count = 1;

            while ($requestModel::where('slug', $slug)->exists()) {
                $slug = "{$original}-" . $count++;
            }

            return $slug;
        }
        return $slug;
    }
}
