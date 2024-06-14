<?php

use App\Http\Controllers\v1\Admin\AdminController;
use App\Http\Controllers\v1\Admin\AuthController as AdAuthController;
use App\Http\Controllers\v1\Ajax\ValidationDataController;
use App\Http\Controllers\v1\careepick\ContactController;
use App\Http\Controllers\v1\careepick\EmployeeController;
use App\Http\Controllers\v1\careepick\EmployerController;
use App\Http\Controllers\v1\careepick\HomePageController;
use App\Http\Controllers\v1\careepick\JobApplyController;
use App\Http\Controllers\v1\careepick\JobController;
use App\Http\Controllers\v1\employer\SocialLoginController;
use App\Http\Controllers\v1\JobProvider\AuthController as JpAuthController;
use App\Http\Controllers\v1\JobProvider\JobPostController;
use App\Http\Controllers\v1\JobSeeker\AuthController as JsAuthController;
use App\Http\Controllers\v1\JobSeeker\JobStatusNotificationController;
use App\Http\Controllers\v1\JobSeeker\ResumeBuilderController;
use App\Http\Controllers\v1\NotificationController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::post('/user-login', [AuthController::class, 'login'])->name('user.signin');
// Route::get('/signout', [AuthController::class, 'signOut'])->name('logout');
// Route::get('/auth', [AuthController::class, 'loginPage'])->name('loginPage');
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::post('/validate', ValidationDataController::class)->name('ajaxValidationData');

Route::prefix('job-seeker')->group(function () {
    Route::controller(JsAuthController::class)->group(function () {
        Route::post('/signin', 'jsSignin')->name('js-signin');
        Route::post('/post-registration', 'jsPostRegistration')->name('js-register.post');
        Route::get('/account/verify/{token}', 'jsVerifyAccount')->name('js-user.verify');
        Route::get('/signout', 'jsSignOut')->name('js-signout');

        Route::middleware('is_logged_in')->group(function () {
            Route::get('/signin-page', 'jsSigninPage')->name('js-signin-page');
            Route::get('/registration-page', 'jsRegistrationPage')->name('js-registration-page');
        });

        Route::middleware('js_auth')->group(function () {
            // Route::middleware('is_js_email_verified')->group(function () {
                Route::prefix('/dashboard')->group(function () {
                    Route::get('/', 'jsDashboard')->name('js-dashboard');
                });
            // });
        });
    });

    Route::middleware('js_auth')->group(function () {
        // Route::middleware('is_js_email_verified')->group(function () {
            Route::controller(ResumeBuilderController::class)->group(function () {
                Route::get('/my-resume', 'myResumePage')->name('resume-builder-page');
                Route::get('/resume', 'showResume')->name('show-resume');
                Route::post('/education/fetch-values', 'fetchRequiredEducationData')->name('fetch-values');
                Route::post('/general-information/add', 'addGeneralInfo')->name('js-add-general-info');

                Route::post('/education/add', 'addEducation')->name('js-add-education');
                Route::get('/education/{id}/fetch', 'fetchSpecificEducationData')->name('js-fetch-education');
                Route::get('/education/{id}/delete', 'deleteEducationData')->name('js-delete-education');

                Route::post('/work-experience/add', 'addWorkExperience')->name('js-add-work-experience');
                Route::post('/work-experience/fetch', 'fetchSpecificExperienceData')->name('js-fetch-work-experience');
                Route::get('/work-experience/{id}/delete', 'deleteWorkXpData')->name('js-delete-work-experience');

                Route::post('/certification/add', 'addCertification')->name('js-add-certification');
                Route::post('/certification/fetch', 'fetchSpecificCertificationData')->name('js-fetch-certification');
                Route::get('/certification/{id}/delete', 'deleteCertificationData')->name('js-delete-certification');

                Route::post('/publications/add', 'addPublications')->name('js-add-publications');
                Route::post('/publications/fetch', 'fetchSpecificPublicationsData')->name('js-fetch-publications');
                Route::get('/publications/{id}/delete', 'deletePublicationsData')->name('js-delete-publications');

                Route::post('/langugaes/add', 'addLangugaes')->name('js-add-langugaes');
                Route::post('/langugaes/fetch', 'fetchSpecificLangugaesData')->name('js-fetch-langugaes');
                Route::get('/langugaes/{id}/delete', 'deleteLangugaesData')->name('js-delete-langugaes');

                Route::post('/skills/add', 'addSkills')->name('js-add-skills');
                Route::post('/skills/fetch', 'fetchSpecificSkillsData')->name('js-fetch-skills');
                Route::get('/skills/{id}/delete', 'deleteSkillsData')->name('js-delete-skills');
            });

            Route::controller(JobApplyController::class)->group(function () {
                Route::get('/{jpId}/job/{jobId}/check', 'index')->name('js-check-cv');
                Route::get('/{jpId}/job/{jobId}/apply', 'jsApplyJobOnline')->name('js-apply-job');
                Route::get('/job/application-successful', 'jsApplyJobOnlineSuccessful')->name('js-apply-job-successful');
                Route::get('/all-applied-jobs', 'manageAllApplicantions')->name('all-applied-jobs');
            });

            Route::get('/fetch-notifications', [JobStatusNotificationController::class, 'fetchNotifications'])->name('js.fetch.notifications');
            Route::post('/mark-notification-read', [JobStatusNotificationController::class, 'markNotificationRead'])->name('js.mark.notification.read');
        // });
    });
});

Route::prefix('job-provider')->group(function () {
    Route::controller(JpAuthController::class)->group(function () {
        Route::post('/signin', 'jpSignin')->name('jp-signin');
        Route::post('/post-registration', 'jpPostRegistration')->name('jp-register.post');
        Route::post('/data/validate', 'jpValidation')->name('jp-validate-data');
        Route::get('/account/verify/{token}', 'jpVerifyAccount')->name('jp-user.verify');
        Route::get('/signout', 'jsSignOut')->name('jp-signout');

        Route::middleware('is_logged_in')->group(function () {
            Route::get('/signin-page', 'jpSigninPage')->name('jp-signin-page');
            Route::get('/registration-page', 'jpRegistrationPage')->name('jp-registration-page');
        });

        Route::middleware('jp_auth')->group(function () {
            // Route::middleware('is_jp_email_verified')->group(function () {
                Route::prefix('/dashboard')->group(function () {
                    Route::get('/', 'jpDashboard')->name('jp-dashboard');
                });
            // });
            Route::get('/profile', 'jpProfile')->name('jp-profile');
            Route::post('/profile/update', 'jpProfileUpdate')->name('jp-profile.update');
        });
    });

    Route::middleware('jp_auth')->group(function () {
        // Route::middleware('is_jp_email_verified')->group(function () {
            Route::controller(JobPostController::class)->group(function () {
                Route::post('/fetch-values', 'fetchRequiredData')->name('jp-fetch-values');
                Route::get('/job-post', 'jobPostPage')->name('job-post-page');
                Route::post('/job-post/add', 'addJobPost')->name('add-job-post');
                Route::get('/manage-jobs', 'manageAllJobPostsPage')->name('manage-jobs');
                Route::get('/{jobSlug}/all-applicants', 'singleJobApplications')->name('jp-single-job-applications');
                Route::get('/{jobSlug}/edit', 'jobApplicationEditPage')->name('jp-edit-job-application');
                Route::post('/job/update', 'jobApplicationUpdate')->name('jp-update-job-application');
                Route::get('/{jobSlug}/delete', 'jobApplicationDelete')->name('jp-delete-job-application');
                Route::get('/all-applicants', 'manageAllApplications')->name('all-applicants');
                Route::post('/manage/fetch/applied-job-status', 'fetchJobApplicationStatus')->name('jp-fetch-job-application-status');
                Route::post('/manage/applied-job/update', 'updateJobApplicationStatus')->name('jp-update-job-application-status');
            });
            Route::controller(ResumeBuilderController::class)->group(function () {
                Route::get('/view/applicants-resume/{applicantsId}/{fileName?}', 'viewResume')->name('view-resume');
                Route::get('/download/applicants-resume/{applicantsId}', 'downloadResume')->name('download-resume');
            });
        // });
    });
});

Route::prefix('admin')->group(function () {
    Route::controller(AdAuthController::class)->group(function () {
        Route::post('/signin', 'adSignin')->name('ad-signin');
        Route::post('/post-registration', 'adPostRegistration')->name('ad-register.post');
        Route::post('/data/validate', 'adValidation')->name('ad-validate-data');
        Route::get('/account/verify/{token}', 'adVerifyAccount')->name('ad-user.verify');
        Route::get('/signout', 'adSignOut')->name('ad-signout');

        Route::middleware('is_logged_in')->group(function () {
            Route::get('/signin-page', 'adSigninPage')->name('ad-signin-page');
            Route::get('/registration-page', 'adRegistrationPage')->name('ad-registration-page');
        });

        Route::middleware('ad_auth')->group(function () {
            // Route::middleware('is_verify_email')->group(function () {
                Route::prefix('/dashboard')->group(function () {
                    Route::get('/', 'adDashboard')->name('ad-dashboard');
                });
            // });
        });
    });

    Route::middleware('ad_auth')->group(function () {
        // Route::middleware('is_verify_email')->group(function () {
            Route::controller(AdminController::class)->group(function () {
                Route::get('/all-recruiters', 'recruitersPage')->name('all-recruiters-page');
                Route::get('/all-employees', 'employeesPage')->name('all-employees-page');
            });
        // });
    });
});

Route::get('/fetch-notifications', [NotificationController::class, 'fetchNotifications'])->name('fetch.notifications');
            Route::post('/mark-notification-read', [NotificationController::class, 'markNotifications'])->name('mark.notification.read');

Route::get('/register-company', [EmployerController::class, 'createCompany'])->name('register-company');

// Route::controller(SocialLoginController::class)->group(function () {
//     Route::get('authorized/{platform}', 'redirectTo')->name('social.auth.redirectTo');
//     Route::get('authorized/{platform}/callback', 'handleCallback')->name('social.auth.handleCallback');
// });

Route::controller(HomePageController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(EmployerController::class)->group(function () {
    Route::prefix('employer')->group(function () {
        Route::get('/', 'employer')->name('employer');
        Route::get('/list', 'employerList')->name('employer-list');
        Route::get('/detail', 'employerDetail')->name('employer-detail');
        Route::get('/create-company', 'createCompany')->name('create-company');
        Route::get('/manage-resume', 'manageResume')->name('manage-resume');
        Route::get('/create-job', 'createJob')->name('create-job');
        Route::get('/resume-detail', 'resumeDetail')->name('resume-detail');
    });
});

Route::controller(EmployeeController::class)->group(function () {
    Route::prefix('employee')->group(function () {
        Route::get('/', 'employee')->name('employee');
    });
});

Route::controller(JobController::class)->group(function () {
    Route::prefix('job')->group(function () {
        Route::get('/', 'index')->name('browse-job');
        Route::post('/list/filter', 'filterJobs')->name('filter-jobs');
        Route::get('/list/{id}', 'fetchJobByCategory')->name('fetch-job-by-category');
        Route::get('/detail/{slug}', 'jobDetail')->name('job-detail');
        Route::get('/manage-job', 'manageJob')->name('manage-job');
        Route::get('/job-detail', 'jobDetail')->name('job.detail');
        Route::get('/category', 'browseCategory')->name('browse-category');

        Route::middleware('js_auth')->group(function () {
            Route::get('/{jpId}/job/{jobId}/save', 'saveJob')->name('js-save-job');
            Route::get('/saved-jobs', 'savedJobs')->name('js-saved-jobs');
        });
    });
});

// Route::controller(ContactController::class)->group(function () {
//     Route::prefix('contact')->group(function () {
//         Route::get('/', 'contact')->name('contact');
//     });
// });

// Route::controller(AuthController::class)->group(function () {
//     Route::prefix('auth')->group(function () {
//         Route::get('/signin', 'signin')->name('signin');
//         Route::get('/signup', 'signup')->name('signup');
//         Route::get('/signout', 'signout')->name('signout');
//     });
// });

Route::get('404', function () {
    return view('careepick.pages.404');
})->name('404');
