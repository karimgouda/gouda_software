<?php

namespace App\Http\Requests\Project;

use App\Models\Project;
use App\Services\ImageService;
use App\Services\TranslatableService;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'categories'    => ['nullable','array'],
            ],
            TranslatableService::validateTranslatableFields(Project::$translatableColumns),
            (new ImageService)->getImageValidationRules(),
            // (new SEOToolsService)->getSEOToolsValidationRules(),
        );

        if (in_array($this->method(), ['PUT', 'PATCH'])) $rules['image'] = ['nullable', 'mimes:jpeg,png,jpg,gif,webp,svg'];

        return $rules;
    }
}
