<?php

namespace App\Models;

use App\Models\Job;
use App\Traits\CleanFiles;
use App\Traits\CleanStorageFiles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recruitment extends Model
{
    use HasFactory,CleanFiles,HasTranslations, CleanStorageFiles;

    protected $guarded = [];

    public $filesFields = [];

    public $storageFilesFields = ['cv'];

    public $filesPath = '';

    public $translatable = [];

    /**
     * Translatable inputs for form creation
     */
    public static $translatableColumns = [

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
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
