<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectCategory extends Model
{
    use HasFactory,HasTranslations;

    public $table = 'project_categories';

    protected $guarded = [];

    public $filesFields = [''];

    public $filesPath = '';

    public $translatable = ['name'];

    /**
     * Translatable inputs for form creation
     */
    public static $translatableColumns = [
        'name' => [
            'type'          => 'text',
            'validations'   => 'required|string|max:20',
            'is_textarea'   => false,
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
     * The projects that belong to the category.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_category', 'category_id', 'project_id');
    }

    /**
     * Get the category name concatenated with the category id and replacing spaces with underscores
     *
     * @return string
     */
    public function uniqueCategoryName() : string
    {
        return str_replace(' ', '_', $this->name) . "_{$this->id}";
    }
}
