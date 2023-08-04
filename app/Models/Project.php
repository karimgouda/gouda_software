<?php

namespace App\Models;

use App\Traits\CleanFiles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory,CleanFiles,HasTranslations;

    protected $guarded = ['image_name'];

    public $filesFields = [];

    public $uniqueFiles = [
        'image' => [
            'formInputKey' => 'image',
        ],
    ];

    public $filesPath = 'projects';

    public $translatable = ['name','address','description'];

    /**
     * Translatable inputs for form creation
     */
    public static $translatableColumns = [
        'name' => [
            'type'          => 'text',
            'validations'   => 'required|string',
            'is_textarea'   => false,
        ],
        'address' => [
            'type'          => 'text',
            'validations'   => 'required|string',
            'is_textarea'   => false,
        ],
        'description' => [
            'type'          => 'text',
            'validations'   => 'required|string',
            'is_textarea'   => true,
        ],
    ];


    /**
     * Return only the translatable fields of  section
     */
    public static function getTranslatableFields()
    {
        return array_keys(self::$translatableColumns);
    }

    /**
     * Get project's categories.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(ProjectCategory::class, 'project_category', 'project_id', 'category_id')->withPivot(['id', 'project_id', 'category_id']);
    }

    /**
     * Get slider's SEO tool.
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphOne;
     */
    public function seotool(): MorphOne
    {
        return $this->morphOne(SEOTool::class, 'seoable');
    }
}
