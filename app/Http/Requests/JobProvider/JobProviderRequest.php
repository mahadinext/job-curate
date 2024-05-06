<?php

namespace App\Http\Requests\JobProvider;

use Illuminate\Foundation\Http\FormRequest;

class JobProviderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'company_name' => 'required|string|max:20',
            'company_bn_name' => 'nullable|string|max:20',
            'company_year_of_establishment' => 'required|string|max:4',
            'company_logo' => 'required',
            'company_slogan' => 'nullable|string|max:80',
            'company_bn_slogan' => 'nullable|string|max:80',
            'company_mail' => 'required|email|max:50',
            'company_password' => 'required|string|max:20',
            'company_description' => 'required|string|max:1000',
            'company_country' => 'required',
            'company_district' => 'required',
            'company_upazila' => 'required',
            'company_address_1' => 'required|string',
            'company_address_2' => 'nullable|string',
            'company_address_3' => 'nullable|string',
            'company_google_map_address' => 'nullable|string',
            'company_phone_no_1' => 'required|string',
            'company_phone_no_2' => 'nullable|string|max:14',
            'company_phone_no_3' => 'nullable|string|max:14',
            'company_website_url' => 'nullable|string|max:30',
            'company_linkedin_url' => 'nullable|string',
            'company_facebook_url' => 'nullable|string',
            'company_glassdoor_url' => 'nullable|string',
            'company_size' => 'required',
            'working_hour' => 'required',
            'company_tin_no' => 'required|string',
            'company_bin_no' => 'sometimes|string',
            'company_trade_license_no' => 'required|string',
            'company_trade_license_document' => 'required',
            'terms_and_condition_agreement' => 'required',
            'privacy_and_policy_agreement' => 'required',
        ];
    }

    public function rulesForCreate()
    {
        return [
            'company_name' => 'required|string|max:20',
            'company_bn_name' => 'nullable|string|max:20',
            'company_year_of_establishment' => 'required|string|max:4',
            'company_logo' => 'required',
            'company_slogan' => 'nullable|string|max:80',
            'company_bn_slogan' => 'nullable|string|max:80',
            'company_mail' => 'required|string|max:50',
            'company_password' => 'required|string|max:20',
            'company_description' => 'required|string|max:1000',
            'company_country' => 'required',
            'company_district' => 'required',
            'company_upazila' => 'required',
            'company_address_1' => 'required|string',
            'company_address_2' => 'nullable|string',
            'company_address_3' => 'nullable|string',
            'company_google_map_address' => 'nullable|string',
            'company_phone_no_1' => 'required|string',
            'company_phone_no_2' => 'nullable|string|max:14',
            'company_phone_no_3' => 'nullable|string|max:14',
            'company_website_url' => 'nullable|string|max:30',
            'company_linkedin_url' => 'nullable|string',
            'company_facebook_url' => 'nullable|string',
            'company_glassdoor_url' => 'nullable|string',
            'company_size' => 'required',
            'working_hour' => 'nullable',
            'company_tin_no' => 'required|string',
            'company_bin_no' => 'nullable|string',
            'company_trade_license_no' => 'required|string',
            'company_trade_license_document' => 'required',
            'terms_and_condition_agreement' => 'required',
            'privacy_and_policy_agreement' => 'required',
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'title' => 'required|string|max:20',
            'subtitle' => 'required|string|max:150',
            'description' => 'required|string|max:450',
            'file_path' => 'file|mimes:jpeg,png,svg,jpg|max:2048|nullableable', // Adjust file types and size limit as needed
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'This field is required.',
            'company_year_of_establishment.required' => 'This field is required.',
            'company_logo.required' => 'This field is required.',
            'company_mail.required' => 'This field is required.',
            'company_password.required' => 'This field is required.',
            'company_description.required' => 'This field is required.',
            'company_country.required' => 'This field is required.',
            'company_district.required' => 'This field is required.',
            'company_upazila.required' => 'This field is required.',
            'company_address_1.required' => 'This field is required.',
            'company_phone_no_1.required' => 'This field is required.',
            'company_size.required' => 'This field is required.',
            'working_hour.required' => 'This field is required.',
            'company_tin_no.required' => 'This field is required.',
            'company_trade_license_no.required' => 'This field is required.',
            'company_trade_license_document.required' => 'This field is required.',
            'terms_and_condition_agreement.required' => 'This field is required.',
            'privacy_and_policy_agreement.required' => 'This field is required.',
        ];
    }
}
