<?php

namespace App\Http\Requests\JobProvider;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    public function rulesForCreate()
    {
        return [
            'job_category_id' => 'required|integer',
            'job_title' => 'required|string|max:80',
            'vacancy' => 'required|integer',
            'salary_type_id' => 'required|integer',
            'salary' => 'nullable|string|max:80',
            'age_id' => 'required|integer',
            'job_location' => 'required|string',
            'experience_id' => 'required|integer',
            'published' => 'nullable',
            'deadline' => 'required',
            'education' => 'required|string',
            'experience_requirments' => 'required|string',
            'additional_requirments' => 'required|string',
            'responsibilities' => 'required|string',
            'compensation_benefits' => 'required|string',
            'job_nature' => 'required|integer',
            'job_place' => 'required|integer',
            'job_highlights' => 'required|string',
        ];
    }

    public function rulesForUpdate()
    {
        return [];
    }

    public function messages()
    {
        return [
            'job_category_id' => 'This field is required.',
            'job_title' => 'This field is required.',
            'vacancy' => 'This field is required.',
            'salary_type_id' => 'This field is required.',
            'age_id' => 'This field is required.',
            'job_location' => 'This field is required.',
            'experience_id' => 'This field is required.',
            'deadline' => 'This field is required.',
            'education' => 'This field is required.',
            'experience_requirments' => 'This field is required.',
            'additional_requirments' => 'This field is required.',
            'responsibilities' => 'This field is required.',
            'compensation_benefits' => 'This field is required.',
            'job_nature' => 'This field is required.',
            'job_place' => 'This field is required.',
            'job_highlights' => 'This field is required.',
        ];
    }
}
