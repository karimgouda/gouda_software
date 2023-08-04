<?php

namespace App\Http\Requests\Project;

use App\Models\ProjectCategory;
use App\Services\TranslatableService;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        return TranslatableService::validateTranslatableFields(ProjectCategory::$translatableColumns);
    }
}
