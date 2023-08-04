<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecruitmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules =
        [
            'name'              => 'required',
            'email'             => 'nullable|email',
            'phone'             => 'nullable',
            'job_id'            => 'required|exists:jobs,id',
            'specialization'    => 'required|string',
            'testimonials'      => 'required|string',
            'cv'                => 'required|file|mimes:doc,docx,pdf,jpeg,png,jpg,gif,svg|max:5120'
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) $rules['cv'] = 'nullable';

        return $rules;
    }
}
