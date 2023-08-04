<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        $rules = array_merge(
            [
            'job_name_en'   => ['required', 'string', 'max:255'],
            'job_name_ar'   => ['required', 'string', 'max:255'],
            ]
        );

        return $rules;
    }
}
