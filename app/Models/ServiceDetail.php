<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceDetail extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable = ['name'];

    protected $guarded = [];

    public $filesFields = [''];

    public $filesPath = '';

    public $translatable = ['name'];

    public static $translatableColumns = [
        'name' => [
            'type'          => 'text',
            'validations'   => 'required|string|max:20',
            'is_textarea'   => false,
        ],
    ];

    // public static array $rules = [
    //     'name'=>'required|string|min:3|max:255',
    // ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_categories', 'service_id', 'service_detail_id');
    }

    /**
     * Return only the translatable fields of  section
     */
    public static function getTranslatableFields()
    {
        return array_keys(self::$translatableColumns);
    }

}
