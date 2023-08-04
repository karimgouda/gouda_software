<?php

namespace App\Http\Repositories;

use App\Models\Slider;
use App\Services\ImageService;
use App\Services\BaseEloquentService;
use App\Services\TranslatableService;
use App\Http\Interfaces\SlidersInterface;


class SlidersRepository extends BaseEloquentService implements SlidersInterface
{

    protected $modelName = Slider::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }


    public function edit()
    {
        $this->instance =  Slider::first();
        // $row = (new SEOToolsService)->getSEOFields($this->instance);
        $row = TranslatableService::getTranslatableFields($this->instance->translatable, $this->instance);

        return view('backend.sliders.edit', compact('row'));
    }


    public function update($request, $id)
    {
        $this->instance = $this->findById($id);

        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);

        $model = $this->executeSave(array_merge($nonTranslatableFields, $translatableFields));
        // (SEOToolsService::withRequestAndModel($request, $model))->updateRelatedSEOTool();

        return redirect()->route('sliders.edit')->with('success','slider updated successfully');
    }

}
