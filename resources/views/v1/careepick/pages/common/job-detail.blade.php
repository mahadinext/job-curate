@extends('v1.careepick.layouts.master')
@section('content')
    <!-- ============================ Header Top Start================================== -->
			<section class="bg-cover primary-bg-dark position-relative py-4">
				<div class="position-absolute top-0 end-0 z-0">
					<img src="{{ URL::asset('assets/img/shape-3-soft-light.svg') }}" alt="SVG" width="100">
				</div>
				<div class="position-absolute top-0 start-0 me-10 z-0">
					<img src="{{ URL::asset('assets/img/shape-1-soft-light.svg') }}" alt="SVG" width="150">
				</div>
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-9 col-md-12">
							<div class="bread-wraps breadcrumbs light">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
										<li class="breadcrumb-item"><a href="{{ route('browse-job') }}">Career</a></li>
										<li class="breadcrumb-item active" aria-current="page">{{ $jobData[0]->job_title }}</li>
								  </ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Header Top End ================================== -->

			<!-- ================================  Job Detail ========================== -->
			<section class="gray-simple position-relative">
				<div class="position-absolute top-0 start-0 primary-bg-dark ht-200 end-0"></div>
				<div class="container">
					<div class="row">
                        @foreach($jobData as $key=> $data)
                            <div class="col-lg-12 col-md-12">

                                <div class="jbs-blocs style_03 border-0 b-0 mb-md-4 mb-sm-4">
                                    <div class="jbs-blocs-body">
                                        <div class="jbs-content px-4 py-4 border-bottom">
                                            <div class="jbs-head-bodys-top">
                                                <div class="jbs-roots-y1 flex-column justify-content-start align-items-start">
                                                    <div class="jbs-roots-y1-last">
                                                        <div class="jbs-urt mb-2"><span class="label text-light primary-2-bg">{{ $data->job_nature_name }}</span></div>
                                                        <div class="jbs-title-iop mb-1"><h2 class="m-0 fs-2">{{ $data->job_title }}</h2></div>
                                                        {{-- <div class="jbs-locat-oiu text-sm-muted text-light d-flex align-items-center">
                                                            <span class="text-muted"><i class="fa-solid fa-location-dot me-1"></i>{{ $data->job_location }}</span>
                                                            <div class="jbs-kioyer-groups ms-3">
                                                                <span class="fa-solid fa-star active"></span>
                                                                <span class="fa-solid fa-star active"></span>
                                                                <span class="fa-solid fa-star active"></span>
                                                                <span class="fa-solid fa-star active"></span>
                                                                <span class="fa-solid fa-star"></span>
                                                                <span class="aal-reveis">4.6</span>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                    {{-- <div class="jbs-roots-y6 py-3">
                                                        <p class="m-0">We are looking for a experienced Senior Front-End Developer with an advanced level of english to design UI/UX interface for web and mobile apps.</p>
                                                    </div> --}}
                                                    <div class="jbs-roots-y6 py-1 d-flex align-items-start flex-wrap">
                                                        <div class="exloip-wraps me-4 my-2">
                                                            <div class="drixko-box d-flex align-items-center">
                                                                <div class="drixko-box-ico me-2">
                                                                    <span class="square--30 rounded-2 bg-light-primary text-primary"><i class="fa-solid fa-briefcase"></i></span>
                                                                </div>
                                                                <div class="drixko-box-caps"><span class="text-medium fw-medium">{{ $data->vacancy }}</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="exloip-wraps me-4 my-2">
                                                            <div class="drixko-box d-flex align-items-center">
                                                                <div class="drixko-box-ico me-2">
                                                                    <span class="square--30 rounded-2 bg-light-primary text-primary"><i class="fa-brands fa-wordpress"></i></span>
                                                                </div>
                                                                <div class="drixko-box-caps"><span class="text-medium fw-medium">{{ $data->experience_range_name }}</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="exloip-wraps my-2 mb-0">
                                                            <div class="drixko-box d-flex align-items-center">
                                                                <div class="drixko-box-ico me-2">
                                                                    <span class="square--30 rounded-2 bg-light-primary text-primary"><i class="fa-solid fa-sack-dollar"></i></span>
                                                                </div>
                                                                <div class="drixko-box-caps">
                                                                    @if($data->salary != null)
                                                                        <span class="text-medium fw-medium">Tk. {{ $data->salary }}</span>
                                                                    @else
                                                                        <span class="text-medium fw-medium">{{ $data->salary_type_name }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jbs-roots-y2">
                                                    <div class="jbs-roots-action-groups">
                                                        <div class="jbs-roots-action-btns">
                                                            @if ($data->isApplied != null && $data->isApplied == true)
                                                                <a href="javascript:void(0)" class="btn btn-md btn-info" disabled="">Applied</a>
                                                            @else
                                                                <a href="{{ route('js-check-cv', ['jpId' => $data->company_id, 'jobId' => $data->id]) }}" class="btn btn-md btn-primary">Quick Apply</a>
                                                            @endif
                                                            @if ($data->isSaved != null && $data->isSaved == true)
                                                                <a href="javascript:void(0)" class="btn btn-md btn-gray ms-2"><i class="fa-solid fa-heart me-2" style="color:red"></i></a>
                                                            @else
                                                                <a href="{{ route('js-save-job', ['jpId' => $data->company_id, 'jobId' => $data->id]) }}" class="btn btn-md btn-gray ms-2"><i class="fa-solid fa-heart me-2"></i>Save Job</a>
                                                            @endif
                                                        </div>
                                                        {{-- <div class="jbs-roots-action-info">
                                                            <span class="text-sm-muted me-2">74 applicants</span>.<span class="text-sm fw-medium text-success ms-2">Posted 54 min ago</span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="jbs-content px-4 py-4 border-bottom">
                                            <h5>Job Description</h5>
                                            <p>Themezhub Web provides equal employment opportunities to all qualified individuals without regard to race, color, religion, sex, gender identity, sexual orientation, pregnancy, age, national origin, physical or mental disability, military or veteran status, genetic information, or any other protected classification. Equal employment opportunity includes, but is not limited to, hiring, training, promotion, demotion, transfer, leaves of absence, and termination. Thynk Web takes allegations of discrimination, harassment, and retaliation seriously, and will promptly investigate when such behavior is reported.</p>
                                            <p>Our company is seeking to hire a skilled Web Developer to help with the development of our current projects. Your duties will primarily revolve around building software by writing code, as well as modifying software to fix errors, adapt it to new hardware, improve its performance, or upgrade interfaces. You will also be involved in directing system testing and validation procedures, and also working with customers or departments on technical issues including software system design and maintenance.</p>
                                            <p class="m-0">We are looking for a Senior Web Developer to build and maintain functional web pages and applications. Senior Web Developer will be leading junior developers, refining website specifications, and resolving technical issues. He/She should have extensive experience building web pages from scratch and in-depth knowledge of at least one of the following programming languages: Javascript, Ruby, or PHP. He/She will ensure our web pages are up and running and cover both internal and customer needs.</p>
                                        </div> --}}
                                        <div class="jbs-content-body px-4 py-4">
                                            <h5 class="mb-3">Job Requirements</h5>
                                            <div class="jbs-content mb-4">
                                                <h6>Qualifications and Educations</h6>
                                                <div>{{ $data->education }}</div>
                                            </div>

                                            <div class="jbs-content mb-4">
                                                <h6>Experience</h6>
                                                <div>{!! $data->experience_requirments !!}</div>
                                            </div>

                                            <div class="jbs-content mb-3">
                                                <h6>Additional Requirements:</h6>
                                                <div>{!! $data->additional_requirments !!}</div>
                                            </div>

                                            <div class="jbs-content mb-4">
                                                <h6>Responsibilities & Context</h6>
                                                <div>{!! $data->responsibilities !!}</div>
                                            </div>

                                            <div class="jbs-content mb-4">
                                                <h6>Skills & Expertise</h6>
                                                <ul class="p-0 m-0 d-flex align-items-center flex-wrap">
                                                    @foreach($data->job_skills as $key1 => $skillData)
                                                        <li class="me-1 mb-1"><span class="label bg-light-success text-success fw-medium">{{ $skillData }}</span></li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                            <div class="jbs-content">
                                                <h6>Compensation & Other Benefits</h6>
                                                <div>{!! $data->compensation_benefits !!}</div>
                                            </div>

                                            <div class="jbs-content mb-4">
                                                <h6>Job Highlights</h6>
                                                <div>{!! $data->job_highlights !!}</div>
                                            </div>

                                            <div class="jbs-content mb-4">
                                                <h6>Workplace</h6>
                                                <div>{{ $data->work_place }}</div>
                                            </div>

                                            <div class="jbs-content mb-4">
                                                <h6>Employment Status</h6>
                                                <div>{{ $data->job_nature_name }}</div>
                                            </div>

                                            <div class="jbs-content mb-4">
                                                <h6>Job Location</h6>
                                                <div>{{ $data->job_location }}</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="jbs-blox-footer">
                                        <div class="blox-first-footer">
                                            <div class="ftr-share-block">
                                                <ul>
                                                    <li><strong>Share This Job:</strong></li>
                                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-facebook"></i></a></li>
                                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-linkedin"></i></a></li>
                                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-google-plus"></i></a></li>
                                                    <li><a href="JavaScript:Void(0);"><i class="fa-brands fa-twitter"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- <div class="blox-last-footer">
                                            <div class="jbs-roots-action-btns">
                                                <p class="m-0"><span class="text-muted me-1">235 Applications</span>|<span class="text-muted ms-1">10:07:2024</span></p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                                {{-- <div class="col-lg-4 col-md-12">
                                    <div class="detail-side-block bg-white mb-4">
                                        <div class="detail-side-heads mb-2">
                                            <h3>Ready To Apply?</h3>
                                            <p>Complete the eligibities checklist now and get started with your online application</p>
                                        </div>
                                        <div class="detail-side-middle">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="">
                                                <label>Name:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" placeholder="">
                                                <label>Email:</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="upload-btn-wrapper full-width">
                                                    <button class="btn full-width">Upload Resume</button>
                                                    <input type="file" name="myfile">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="elsoci"><label>Are you authorised to work in India?</label></div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="workindia" id="wyes" value="option1">
                                                    <label class="form-check-label" for="wyes">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="workindia" id="wno" value="option1">
                                                    <label class="form-check-label" for="wno">No</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="elsoci"><label>Do you have master degree?</label></div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="degree" id="dyed" value="option1">
                                                    <label class="form-check-label" for="dyed">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="degree" id="dno" value="option1">
                                                    <label class="form-check-label" for="dno">No</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="jobalert" value="option1">
                                                    <label class="form-check-label" for="jobalert">Create Job Alert</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary full-width fw-medium font-sm">Submit Application</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="side-jbs-info-blox bg-white mb-4">
                                        <div class="side-jbs-info-header">
                                            <div class="side-jbs-info-thumbs">
                                                <figure><img src="{{ URL::asset('assets/img/l-12.png') }}" class="img-fluid" alt=""></figure>
                                            </div>
                                            <div class="side-jbs-info-captionyo ps-3">
                                                <div class="sld-info-title">
                                                    <h5 class="rtls-title mb-1">Google Inc.</h5>
                                                    <div class="jbs-locat-oiu text-sm-muted">
                                                        <span class="me-1"><i class="fa-solid fa-location-dot me-1"></i>California, USA</span>.<span class="ms-1">Software & Consultancy</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="side-jbs-info-middle">
                                            <div class="side-full-info-groups">
                                                <div class="single-side-info">
                                                    <span class="text-sm-muted sld-subtitle">Company Founder:</span>
                                                    <h6 class="sld-title">Mr. Daniel Mark</h6>
                                                </div>
                                                <div class="single-side-info">
                                                    <span class="text-sm-muted sld-subtitle">Industry:</span>
                                                    <h6 class="sld-title">Technology</h6>
                                                </div>
                                                <div class="single-side-info">
                                                    <span class="text-sm-muted sld-subtitle">Founded:</span>
                                                    <h6 class="sld-title">1997</h6>
                                                </div>
                                                <div class="single-side-info">
                                                    <span class="text-sm-muted sld-subtitle">Head Office:</span>
                                                    <h6 class="sld-title">London, UK</h6>
                                                </div>
                                                <div class="single-side-info">
                                                    <span class="text-sm-muted sld-subtitle">Revenue</span>
                                                    <h6 class="sld-title">$70B+</h6>
                                                </div>
                                                <div class="single-side-info">
                                                    <span class="text-sm-muted sld-subtitle">Company Size:</span>
                                                    <h6 class="sld-title">20,000+ Emp.</h6>
                                                </div>
                                                <div class="single-side-info">
                                                    <span class="text-sm-muted sld-subtitle">Min Exp.</span>
                                                    <h6 class="sld-title">02 Years</h6>
                                                </div>
                                                <div class="single-side-info">
                                                    <span class="text-sm-muted sld-subtitle">Openings</span>
                                                    <h6 class="sld-title">06 Openings</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="side-rtl-jbs-block">
                                        <div class="side-rtl-jbs-head">
                                            <h5 class="side-jbs-titles">Related Jobs</h5>
                                        </div>
                                        <div class="side-rtl-jbs-body">
                                            <div class="side-rtl-jbs-groups">

                                                <div class="single-side-rtl-jbs">
                                                    <div class="single-fliox">
                                                        <div class="single-rtl-jbs-thumb">
                                                            <a href="job-detail.html"><figure><img src="{{ URL::asset('assets/img/l-1.png') }}" class="img-fluid" alt=""></figure></a>
                                                        </div>
                                                        <div class="single-rtl-jbs-caption">
                                                            <div class="hjs-rtls-titles">
                                                                <div class="jbs-types mb-1"><span class="label text-success bg-light-success">Full Time</span></div>
                                                                <h5 class="rtls-title"><a href="joob-detail.html">Sr. Front-end Designer</a></h5>
                                                                <div class="jbs-locat-oiu text-sm-muted">
                                                                    <span><i class="fa-solid fa-location-dot me-1"></i>California, USA</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-rtl-jbs-hot">
                                                        <div class="single-tag-rtls"><span class="label text-warning bg-light-warning"><i class="fa-brands fa-hotjar me-1"></i>New</span></div>
                                                        <div class="single-tag-rtls"><span class="label text-success bg-light-success"><i class="fa-solid fa-star me-1"></i>Featured</span></div>
                                                    </div>
                                                </div>

                                                <div class="single-side-rtl-jbs">
                                                    <div class="single-fliox">
                                                        <div class="single-rtl-jbs-thumb">
                                                            <a href="job-detail.html"><figure><img src="{{ URL::asset('assets/img/l-2.png') }}" class="img-fluid" alt=""></figure></a>
                                                        </div>
                                                        <div class="single-rtl-jbs-caption">
                                                            <div class="hjs-rtls-titles">
                                                                <div class="jbs-types mb-1"><span class="label text-success bg-light-success">Full Time</span></div>
                                                                <h5 class="rtls-title"><a href="joob-detail.html">Jr. PHP Developer</a></h5>
                                                                <div class="jbs-locat-oiu text-sm-muted">
                                                                    <span><i class="fa-solid fa-location-dot me-1"></i>Canada, USA</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-rtl-jbs-hot">
                                                        <div class="single-tag-rtls"><span class="label text-success bg-light-success"><i class="fa-solid fa-star me-1"></i>Featured</span></div>
                                                    </div>
                                                </div>

                                                <div class="single-side-rtl-jbs">
                                                    <div class="single-fliox">
                                                        <div class="single-rtl-jbs-thumb">
                                                            <a href="job-detail.html"><figure><img src="{{ URL::asset('assets/img/l-3.png') }}" class="img-fluid" alt=""></figure></a>
                                                        </div>
                                                        <div class="single-rtl-jbs-caption">
                                                            <div class="hjs-rtls-titles">
                                                                <div class="jbs-types mb-1"><span class="label text-danger bg-light-danger">Internship</span></div>
                                                                <h5 class="rtls-title"><a href="joob-detail.html">Project Manager For PHP</a></h5>
                                                                <div class="jbs-locat-oiu text-sm-muted">
                                                                    <span><i class="fa-solid fa-location-dot me-1"></i>Liverpool, UK</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-rtl-jbs-hot">
                                                        <div class="single-tag-rtls"><span class="label text-warning bg-light-warning"><i class="fa-brands fa-hotjar me-1"></i>New</span></div>
                                                        <div class="single-tag-rtls"><span class="label text-success bg-light-success"><i class="fa-solid fa-star me-1"></i>Featured</span></div>
                                                    </div>
                                                </div>

                                                <div class="single-side-rtl-jbs">
                                                    <div class="single-fliox">
                                                        <div class="single-rtl-jbs-thumb">
                                                            <a href="job-detail.html"><figure><img src="{{ URL::asset('assets/img/l-5.png') }}" class="img-fluid" alt=""></figure></a>
                                                        </div>
                                                        <div class="single-rtl-jbs-caption">
                                                            <div class="hjs-rtls-titles">
                                                                <div class="jbs-types mb-1"><span class="label text-warning bg-light-warning">Full Time</span></div>
                                                                <h5 class="rtls-title"><a href="joob-detail.html">Sr. Magento Developer 2.0</a></h5>
                                                                <div class="jbs-locat-oiu text-sm-muted">
                                                                    <span><i class="fa-solid fa-location-dot me-1"></i>California, USA</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-rtl-jbs-hot">
                                                        <div class="single-tag-rtls"><span class="label text-success bg-light-success"><i class="fa-solid fa-star me-1"></i>Featured</span></div>
                                                    </div>
                                                </div>

                                                <div class="single-side-rtl-jbs">
                                                    <div class="single-fliox">
                                                        <div class="single-rtl-jbs-thumb">
                                                            <a href="job-detail.html"><figure><img src="{{ URL::asset('assets/img/l-6.png') }}" class="img-fluid" alt=""></figure></a>
                                                        </div>
                                                        <div class="single-rtl-jbs-caption">
                                                            <div class="hjs-rtls-titles">
                                                                <div class="jbs-types mb-1"><span class="label text-danger bg-light-danger">Internship</span></div>
                                                                <h5 class="rtls-title"><a href="joob-detail.html">Shopify Developer Fresher</a></h5>
                                                                <div class="jbs-locat-oiu text-sm-muted">
                                                                    <span><i class="fa-solid fa-location-dot me-1"></i>New York, USA</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-rtl-jbs-hot">
                                                        <div class="single-tag-rtls"><span class="label text-warning bg-light-warning"><i class="fa-brands fa-hotjar me-1"></i>New</span></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div> --}}
                        @endforeach
					</div>
				</div>
			</section>
			<!-- =============================== Job Detail ================================== -->
@endsection
