@extends('v1.careepick.dashboard.layouts.jp-master')
@section('content')
    <div class="upper-title-box">
        <h3>Company Profile!</h3>
        <div class="text">Ready to jump back in?</div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('jp-profile.update') }}" enctype="multipart/form-data">
                @csrf
                @foreach($profileData as $data)
                    {{-- Account Information --}}
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Account Information</h4>
                            </div>
                            <div class="widget-content">

                                <div class="row">

                                    <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input name="company_mail" type="email"
                                            class="form-control ajax-validation-input @error('company_mail') is-invalid @enderror"
                                            value="{{ $data->company_mail }}" placeholder="">
                                        @if ($errors->has('company_mail'))
                                            <span
                                                class="text-danger">{{ $errors->first('company_mail') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input name="company_password" type="password"
                                            class="form-control ajax-validation-input company_password @error('company_password') is-invalid @enderror"
                                            value="" placeholder="">
                                        @if ($errors->has('company_password'))
                                            <span
                                                class="text-danger">{{ $errors->first('company_password') }}</span>
                                        @endif
                                    </div>
                                    {{-- <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                        <label>Confirm Password <span class="text-danger">*</span></label>
                                        <input name="" type="password"
                                            class="form-control confirm_company_password" placeholder="">
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- General Information -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                        <div class="widget-title">
                            <h4>General Information</h4>
                        </div>

                        <div class="widget-content">
                            <div class="row">
                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Company Name <span class="text-danger">*</span></label>
                                    <input name="company_name" type="text"
                                        class="form-control ajax-validation-input @error('company_name') is-invalid @enderror"
                                        value="{{ $data->company_name }}" placeholder="">
                                    @if ($errors->has('company_name'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>কোম্পানির নাম (বাংলায়)</label>
                                    <input name="company_bn_name" type="text"
                                        class="form-control ajax-validation-input @error('company_bn_name') is-invalid @enderror"
                                        value="{{ $data->company_bn_name }}" placeholder="">
                                    @if ($errors->has('company_bn_name'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_bn_name') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Year of Establishment <span
                                            class="text-danger">*</span></label>
                                    <select name="company_year_of_establishment"
                                        class="wide form-control @error('company_year_of_establishment') is-invalid @enderror"
                                        value="{{ old('company_year_of_establishment') }}">
                                        <option value="">Select Year</option>
                                        @foreach ($yearsData as $key => $yearData)
                                            @if ($yearData->year <= (new DateTime())->format('Y'))
                                                <option @if($yearData->year == $data->company_year_of_establishment) selected @endif value="{{ $yearData->year }}">{{ $yearData->year }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_year_of_establishment'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_year_of_establishment') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-12 col-sm-12 col-xs-12">
                                    <label>Company Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="company_description" type="text"
                                        class="form-control ajax-validation-input @error('company_description') is-invalid @enderror" placeholder="">{{ $data->company_description }}</textarea>
                                    @if ($errors->has('company_description'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_description') }}</span>
                                    @endif
                                </div>

                                {{-- <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Comapny Type <span class="text-danger">*</span></label>
                                    <select name="company_type" class="wide form-control">
                                        <option value="">Select Comapny Type</option>
                                        @foreach ($employmentTypeData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->employment_type }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Comapny Size <span class="text-danger">*</span></label>
                                    <select name="company_size"
                                        class="wide form-control @error('company_size') is-invalid @enderror"
                                        value="{{ old('company_size') }}">
                                        <option value="">Select Comapny Size</option>
                                        @foreach ($employeeSizeData as $key => $sizeData)
                                            <option @if($sizeData->id == $data->company_size) selected @endif value="{{ $sizeData->id }}">
                                                {{ $sizeData->size_range }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_size'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_size') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Company Tagline</label>
                                    <input name="company_slogan" type="text"
                                        class="form-control ajax-validation-input @error('company_slogan') is-invalid @enderror"
                                        value="{{ $data->company_slogan }}" placeholder="">
                                    @if ($errors->has('company_slogan'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_slogan') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>কোম্পানির স্লোগান (বাংলায়)</label>
                                    <input name="company_bn_slogan" type="text"
                                        class="form-control ajax-validation-input @error('company_bn_slogan') is-invalid @enderror"
                                        value="{{ $data->company_bn_slogan }}" placeholder="">
                                    @if ($errors->has('company_bn_slogan'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_bn_slogan') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Company Logo <span class="text-danger">*</span></label>
                                    <div class="custom-file-upload">
                                        <input name="company_logo" class="mt-3" type="file"
                                            id="file" />
                                        @if ($errors->has('company_logo'))
                                            <span
                                                class="text-danger">{{ $errors->first('company_logo') }}</span>
                                        @endif
                                    </div>
                                    <img class="mt-3" alt="{{ $data->company_name }} Logo" src="{{ URL::asset($data->company_logo) }}" width="64px">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Company Contact Information -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Company Contact Information</h4>
                        </div>

                        <div class="widget-content">
                            <div class="row">
                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Country <span class="text-danger">*</span></label>
                                    <select name="company_country"
                                        class="wide form-control @error('company_country') is-invalid @enderror"
                                        value="{{ old('company_country') }}">
                                        <option value="">Select Country</option>
                                        @foreach ($countryData as $key => $countryData)
                                            <option @if($countryData->id == $data->company_country) selected @endif value="{{ $countryData->id }}">
                                                {{ $countryData->country_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_country'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_country') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12 m-clear">
                                    <label>District <span class="text-danger">*</span></label>
                                    <select name="company_district"
                                        class="wide form-control @error('company_district') is-invalid @enderror"
                                        value="{{ old('company_district') }}">
                                        <option value="">Select District</option>
                                        @foreach ($districtData as $key => $districtData)
                                            <option @if($districtData->id == $data->company_district) selected @endif value="{{ $districtData->id }}">{{ $districtData->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_district'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_district') }}</span>
                                    @endif
                                </div>

                                {{-- <div class="mb-4 col-md-4 col-sm-6 col-xs-12 m-clear">
                                    <label>Upazila <span class="text-danger">*</span></label>
                                    <select name="company_upazila"
                                        class="wide form-control @error('company_upazila') is-invalid @enderror"
                                        value="{{ $data->company_upazila }}">
                                        <option value="">Select Upazila</option>
                                        @foreach ($upazilaData as $key => $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('company_upazila'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_upazila') }}</span>
                                    @endif
                                </div> --}}

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Address <span class="text-danger">*</span></label>
                                    <textarea name="company_address_1" type="text"
                                        class="form-control ajax-validation-input @error('company_address_1') is-invalid @enderror" placeholder="">{{ $data->company_address_1 }}</textarea>
                                    @if ($errors->has('company_address_1'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_address_1') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Address 2</label>
                                    <textarea name="company_address_2" type="text"
                                        class="form-control ajax-validation-input @error('company_address_2') is-invalid @enderror" placeholder="">{{ $data->company_address_2 }}</textarea>
                                    @if ($errors->has('company_address_2'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_address_2') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Address 3</label>
                                    <textarea name="company_address_3" type="text"
                                        class="form-control ajax-validation-input @error('company_address_3') is-invalid @enderror" placeholder="">{{ $data->company_address_3 }}</textarea>
                                    @if ($errors->has('company_address_3'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_address_3') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Phone Number <span class="text-danger">*</span></label>
                                    <input name="company_phone_no_1" type="text"
                                        class="form-control ajax-validation-input @error('company_phone_no_1') is-invalid @enderror"
                                        value="{{ $data->company_phone_no_1 }}" placeholder="">
                                    @if ($errors->has('company_phone_no_1'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_phone_no_1') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Phone Number 2</label>
                                    <input name="company_phone_no_2" type="text"
                                        class="form-control ajax-validation-input @error('company_phone_no_2') is-invalid @enderror"
                                        value="{{ $data->company_phone_no_2 }}" placeholder="">
                                    @if ($errors->has('company_phone_no_2'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_phone_no_2') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Phone Number 3</label>
                                    <input name="company_phone_no_3" type="text"
                                        class="form-control ajax-validation-input @error('company_phone_no_3') is-invalid @enderror"
                                        value="{{ $data->company_phone_no_3 }}" placeholder="">
                                    @if ($errors->has('company_phone_no_3'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_phone_no_3') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Google Map Location</label>
                                    <textarea name="company_google_map_address" type="text"
                                        class="form-control ajax-validation-input @error('company_google_map_address') is-invalid @enderror"
                                        placeholder="">{{ $data->company_google_map_address }}</textarea>
                                    @if ($errors->has('company_google_map_address'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_google_map_address') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                    {{-- Social Accounts --}}
                    <div class="ls-widget">
                        <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Social Accounts</h4>
                        </div>
                        <div class="widget-content">

                            <div class="row">

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Website Link</label>
                                    <input name="company_website_url" type="text"
                                        class="form-control ajax-validation-input @error('company_website_url') is-invalid @enderror"
                                        value="{{ $data->company_website_url }}" placeholder="">
                                    @if ($errors->has('company_website_url'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_website_url') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>LinkedIn</label>
                                    <input name="company_linkedin_url" type="text"
                                        class="form-control ajax-validation-input @error('company_linkedin_url') is-invalid @enderror"
                                        value="{{ $data->company_linkedin_url }}"
                                        placeholder="https://www.linkedin.com/">
                                    @if ($errors->has('company_linkedin_url'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_linkedin_url') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Facebook</label>
                                    <input name="company_facebook_url" type="text"
                                        class="form-control ajax-validation-input @error('company_facebook_url') is-invalid @enderror"
                                        value="{{ $data->company_facebook_url }}"
                                        placeholder="https://www.facebook.com/">
                                    @if ($errors->has('company_facebook_url'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_facebook_url') }}</span>
                                    @endif
                                </div>

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Glassdoor</label>
                                    <input name="company_glassdoor_url" type="text"
                                        class="form-control ajax-validation-input @error('company_glassdoor_url') is-invalid @enderror"
                                        value="{{ $data->company_glassdoor_url }}"
                                        placeholder="https://www.glassdoor.com/">
                                    @if ($errors->has('company_glassdoor_url'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_glassdoor_url') }}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        </div>
                    </div>

                    {{-- Company Official Documents --}}
                    <div class="ls-widget">
                        <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Company Official Documents</h4>
                        </div>
                        <div class="widget-content">

                            <div class="row">

                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Trade License No <span class="text-danger">*</span></label>
                                    <input name="company_trade_license_no" type="text"
                                        class="form-control ajax-validation-input @error('company_trade_license_no') is-invalid @enderror"
                                        value="{{ $data->company_trade_license_no }}" placeholder="">
                                    @if ($errors->has('company_trade_license_no'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_trade_license_no') }}</span>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>BIN No</label>
                                    <input name="company_bin_no" type="text"
                                        class="form-control ajax-validation-input @error('company_bin_no') is-invalid @enderror"
                                        value="{{ $data->company_bin_no }}" placeholder="">
                                    @if ($errors->has('company_bin_no'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_bin_no') }}</span>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>TIN No <span class="text-danger">*</span></label>
                                    <input name="company_tin_no" type="text"
                                        class="form-control ajax-validation-input @error('company_tin_no') is-invalid @enderror"
                                        value="{{ $data->company_tin_no }}" placeholder="">
                                    @if ($errors->has('company_tin_no'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_tin_no') }}</span>
                                    @endif
                                </div>
                                <div class="mb-4 col-md-4 col-sm-6 col-xs-12">
                                    <label>Trade License <span class="text-danger">*</span></label>
                                    <input name="company_trade_license_document" type="file"
                                        class="form-control ajax-validation-input @error('company_trade_license_document') is-invalid @enderror"
                                        value="{{ $data->company_trade_license_document }}"
                                        placeholder="">
                                    @if ($errors->has('company_trade_license_document'))
                                        <span
                                            class="text-danger">{{ $errors->first('company_trade_license_document') }}</span>
                                    @endif
                                </div>

                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <button type="submit" class="btn btn-primary full-width font--bold btn-md">
                        Update
                    </button>
                </div>

        </form>

        </div>


    </div>

@endsection
