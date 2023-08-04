<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ServiceDetailInterface;
use App\Models\Service;
use App\Services\ImageService;
use App\Services\SEO\SEOToolsService;
use App\Services\BaseEloquentService;
use App\Services\TranslatableService;
use App\Http\Interfaces\ServicesInterface;
use App\Models\ServiceDetail;
use Illuminate\Support\Arr;

class ServicesRepository extends BaseEloquentService implements ServicesInterface
{
    protected $modelName = Service::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }

    public function index($dataTable)
    {
        return $dataTable->render('backend.services.index');
    }

    public function create()
    {
        $service_details = app()->make(ServiceDetailInterface::class)->getAll();
        return view('backend.services.create',compact('service_details'));
    }
    public function show($id)
    {
        $row = $this->findById($id);
        return view('backend.sliders.show', compact('row'));
    }
    public function store($request)
    {
        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);
        $data = array_merge($nonTranslatableFields, $translatableFields);
        $model = $this->executeSave(Arr::except($data , 'service_detail'));
        if(isset($data['service_detail'])){
            $model->service_details()->sync($data['service_detail']);
        }
        (SEOToolsService::withRequestAndModel($request, $model))->handleSEOToolsDetails();

        return redirect()->route('services.index')->with('success','Service created successfully');
    }

    public function edit($id)
    {
        $this->instance = $this->findById($id);
        $service_details = app()->make(ServiceDetailInterface::class)->getAll();
        $row = TranslatableService::getTranslatableFields($this->instance->translatable, $this->instance);
        $row = array_merge($row, (new SEOToolsService)->getSEOFields($this->instance));

        return view('backend.services.edit', compact('row', 'id','service_details'));
    }


    public function update($request, $id)
    {
        $this->instance = $this->findById($id);

        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);

        $model = $this->executeSave(array_merge($nonTranslatableFields, $translatableFields));
        (SEOToolsService::withRequestAndModel($request, $model))->updateRelatedSEOTool();

        return redirect()->route('services.index')->with('success','Service updated successfully');
    }

    public function destroy($id)
    {
        $this->instance = $this->findById($id);
        (new SEOToolsService)->deleteRelatedSEOTool($this->instance);

        $this->delete($id);
        return redirect()->route('services.index')->with('success','Service deleted successfully');
    }

    public function bulkDestroy($ids)
    {
        $this->destroyAll($ids);
        return redirect()->route('services.index')->with('success','services deleted successfully');
    }
}
