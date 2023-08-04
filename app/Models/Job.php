<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Job extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public $filesFields = [];

    public $uniqueFiles = [];

    public $filesPath = '';

    public $translatable = ['job_name'];

    /**
     * Translatable inputs for form creation
     */
    public static $translatableColumns = [
        'job_name' => [
            'type'          => 'text',
            'validations'   => 'required|string|max:255',
            'is_textarea'   => false,
        ]
    ];


    /**
     * Return only the translatable fields of  section
     */
    public static function getTranslatableFields()
    {
        return array_keys(self::$translatableColumns);
    }

    /**
     * 
     */
    public function recruitments()
    {
        return $this->hasMany(Recruitment::class);
    }
}
