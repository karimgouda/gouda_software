<?php

namespace App\Models;

use App\Models\SEOTool;
use App\Traits\CleanFiles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory,CleanFiles,HasTranslations;

    public $fillable = ['title', 'image','description', 'price','image_title', 'image_alt'];

    public $translatable = ['title','description'];
    public $filesFields = [];

    public $uniqueFiles = [
        'image' => [
            'formInputKey' => 'image',
        ],
    ];

    public $filesPath = 'services';

    /**
     * Translatable inputs for form creation
     */
    public static $translatableColumns = [
        'title' => [
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

    public function service_details()
    {
        return $this->belongsToMany(ServiceDetail::class, 'service_categories', 'service_id', 'service_detail_id');
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
