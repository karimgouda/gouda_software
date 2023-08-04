<?php

namespace App\Traits;

use App\Services\ImageService;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait CleanStorageFiles
{
    /**
     * Override the default behaviour
     */
    protected static function bootCleanStorageFiles()
    {
        static::deleted(function (Model $model) {
            foreach ($model->storageFilesFields as $field) {
                Storage::delete($model->{$field});
            }
        });

        static::updated(function (Model $model) {
            foreach ($model->storageFilesFields as $field) {
                if ($model->wasChanged($field)) {
                    Storage::delete($model->getOriginal($field));
                }
            }
        });
    }
}
