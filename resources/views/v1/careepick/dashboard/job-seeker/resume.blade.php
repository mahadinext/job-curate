<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Resume</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta content="careepick" name="description" />
    <meta content="Mahadi" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Stylesheets -->
    <link href="{{ URL::asset('dashboard/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/assets/css/custom.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="shortcut icon" href="{{ URL::asset('dashboard/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::asset('dashboard/assets/images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Invoice Section -->
        <section class="invoice-section">
            <div class="auto-container">
                <div class="invoice-wrap">
                    <div class="invoice-content">
                        <div class="logo-box" style="display: block">
                            {{-- <div class="logo"><a href="index.html"><img src="images/logo.svg" alt=""></a>
                            </div> --}}
                            <div class="invoice-id" style="max-width: 100%; display: block; margin-bottom: 30px;">
                                {{ $jobSeekerData[0]->jobseeker_name }}
                                <p class="mb-0">{{ $jobSeekerData[0]->jobseeker_mail }}</p>
                                <p class="mb-0">{{ $jobSeekerData[0]->jobseeker_phone_no_1 }}</p>
                                <p class="mb-0">{{ $jobSeekerData[0]->jobseeker_address }}</p>
                            </div>
                        </div>

                        <div class="logo-box" style="display: block">
                            <div class="invoice-id" style="max-width: 100%; display: block; margin-bottom: 30px;">
                                <p style="font-weight: 500; font-size: 26px; line-height: 35px; color: #202124; margin-bottom: 0.5rem;">Career Summary</p>
                                <p>{{ $jobSeekerData[0]->jobseeker_career_summary }}</p>
                            </div>
                        </div>

                        @if (!empty($jobSeekerExperiencesData))
                            <div class="logo-box" style="display: block">
                                <div class="invoice-id" style="max-width: 100%; display: block; margin-bottom: 30px;">
                                    <p style="font-weight: 500; font-size: 26px; line-height: 35px; color: #202124; margin-bottom: 0.5rem;">Professional Experience</p>
                                    @foreach($jobSeekerExperiencesData as $key => $data)
                                        <div class="mb-4">
                                            <p class="mb-0" style="font-size: 1.1rem; font-weight: 500; color: black;">{{ $data->designation }}</p>
                                            <p class="mb-0" style="font-size: 1.1rem; font-weight: 400; color: black;">{{ $data->organization_name }}</p>
                                            <p class="mb-0">{{ $data->workingTime }} ({{ $data->workingDuration }})</p>
                                            <p class="mb-0">{{ $data->responsibilities }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (!empty($jobSeekerSkillsData))
                            <div class="logo-box" style="display: block">
                                <div class="" style="max-width: 100%; display: block; margin-bottom: 30px;">
                                    <p style="font-weight: 500; font-size: 26px; line-height: 35px; color: #202124; margin-bottom: 0.5rem;">Skills</p>
                                    <div>
                                        @foreach ($jobSeekerSkillsData as $key => $data)
                                            <span class="badge rounded-pill bg-primary" style="color: black!important;">
                                                {{ $data->skills->skill_name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (!empty($jobSeekerEducationsData))
                            <div class="logo-box" style="display: block">
                                <div class="invoice-id info" style="max-width: 100%; display: block; margin-bottom: 30px;">
                                    <p style="font-weight: 500; font-size: 26px; line-height: 35px; color: #202124; margin-bottom: 0.5rem;">Education</p>
                                    @foreach($jobSeekerEducationsData as $key => $data)
                                        <div class="mb-4">
                                            <p class="mb-0" style="font-size: 1.1rem; font-weight: 500; color: black;">{{ $data->educationDegreeTitle->degree_initial_form }} in {{ $data->educationSubject->subject_name }}</p>
                                            <p class="mb-0" style="font-size: 1.1rem; font-weight: 400; color: black;">{{ $data->institute_name }}</p>
                                            @if ($data->cgpa != null && $data->education_institute_type_id == 4)
                                                <p class="mb-0">CGPA:
                                                    {{ $data->cgpa }}/{{ $data->scale }}
                                                </p>
                                            @elseif($data->cgpa != null)
                                                <p class="mb-0">GPA:
                                                    {{ $data->cgpa }}/{{ $data->scale }}
                                                </p>
                                            @elseif($data->marks != null)
                                                <p class="mb-0">Marks: {{ $data->marks }}%</p>
                                            @endif
                                            <p class="mb-0">
                                                Year:
                                                @if ($data->duration != null)
                                                    {{ $data->year_of_passing - $data->duration }}
                                                    -
                                                @endif
                                                    {{ $data->year_of_passing }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (!empty($jobSeekerCertificationData))
                            <div class="logo-box" style="display: block">
                                <div class="invoice-id" style="max-width: 100%; display: block; margin-bottom: 30px;">
                                    <p style="font-weight: 500; font-size: 26px; line-height: 35px; color: #202124; margin-bottom: 0.5rem;">Licenses & Certifications</p>
                                    @foreach($jobSeekerCertificationData as $key => $data)
                                        <div class="mb-4">
                                            <p class="mb-0" style="font-size: 1.1rem; font-weight: 500; color: black;">{{ $data->certification_name }}</p>
                                            <p class="mb-0" style="font-size: 1.1rem; font-weight: 400; color: black;">{{ $data->certification_institution }}</p>
                                            <p class="mb-0">{{ $data->certified_month }}, {{ $data->certified_year }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (!empty($jobSeekerResearchPapersData))
                            <div class="logo-box" style="display: block">
                                <div class="invoice-id" style="max-width: 100%; display: block; margin-bottom: 30px;">
                                    <p style="font-weight: 500; font-size: 26px; line-height: 35px; color: #202124; margin-bottom: 0.5rem;">Research Papers & Publications</p>
                                    @foreach($jobSeekerResearchPapersData as $key => $data)
                                        <div class="mb-4">
                                            <p class="mb-0" style="font-size: 1.1rem; font-weight: 500; color: black;">{{ $data->research_paper_subject }}</p>
                                            <p class="mb-0">{{ $data->research_paper_summary }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if (!empty($jobSeekerLanguagesData))
                            <div class="logo-box" style="display: block">
                                <div class="invoice-id" style="max-width: 100%; display: block; margin-bottom: 30px;">
                                    <p style="font-weight: 500; font-size: 26px; line-height: 35px; color: #202124; margin-bottom: 0.5rem;">Languages</p>
                                    @foreach($jobSeekerLanguagesData as $key => $data)
                                        <p class="mb-2" style="font-size: 1.1rem; font-weight: 400; color: black;">{{ $data->language->language_name }} - {{ $data->proficiency }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- End Invoice Section -->


    </div><!-- End Page Wrapper -->


    <script src="{{ URL::asset('dashboard/assets/js/jquery.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/chosen.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/jquery.modal.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/mmenu.polyfills.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/mmenu.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/appear.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/ScrollMagic.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/rellax.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/owl.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/wow.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/js/script.js') }}"></script>


</body>

</html>
