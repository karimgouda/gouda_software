<?php

namespace App\Http\Repositories;
use App\Models\Partner;
use App\Services\ImageService;
use App\Services\BaseEloquentService;
use App\Services\SEO\SEOToolsService;
use App\Services\TranslatableService;
use App\Http\Interfaces\PartnerInterface;

class PartnerRepository extends BaseEloquentService implements PartnerInterface
{
    protected $modelName = Partner::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }


    public function index($dataTable)
    {
        return $dataTable->render('backend.partners.index');
    }

    public function create()
    {
        return view('backend.partners.create');
    }
    public function show($id)
    {
        //
    }
    public function store($request)
    {
        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $data  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);
        $this->executeSave($data);

        return redirect()->route('partners.index')->with('success','Service created successfully');
    }

    public function edit($id)
    {
        $this->instance = $this->findById($id);
        $row = TranslatableService::getTranslatableFields($this->instance->translatable, $this->instance);

        return view('backend.partners.edit', compact('row', 'id'));
    }


    public function update($request, $id)
    {
        $this->instance = $this->findById($id);

        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);

        $this->executeSave(array_merge($nonTranslatableFields, $translatableFields));

        return redirect()->route('partners.index')->with('success','partner updated successfully');
    }

    public function destroy($id)
    {
        $this->delete($id);
        return redirect()->route('partners.index')->with('success','partner deleted successfully');
    }

    public function bulkDestroy($ids)
    {
        $this->destroyAll($ids);
        return redirect()->route('partners.index')->with('success','partners deleted successfully');
    }
}
