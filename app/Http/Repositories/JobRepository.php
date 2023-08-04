<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\JobInterface;
use App\Models\Job;
use App\Services\ImageService;
use App\Services\BaseEloquentService;
use App\Services\TranslatableService;
use App\Services\SEO\SEOToolsService;

class JobRepository extends BaseEloquentService implements JobInterface
{

    protected $modelName = Job::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }


    public function index($dataTable)
    {
        return $dataTable->render('backend.jobs.index');
    }


    public function create()
    {
        return view('backend.jobs.create');
    }


    public function store($request)
    {
        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);

        $model = $this->executeSave(array_merge($nonTranslatableFields, $translatableFields));
        (SEOToolsService::withRequestAndModel($request, $model))->handleSEOToolsDetails();

        return redirect()->route('jobs.index')->with('success','job created successfully');
    }


    public function show($id)
    {
        $row = $this->findById($id);
        return view('backend.jobs.show', compact('row'));
    }


    public function edit($id)
    {
        $this->instance = $this->findById($id);
        $row = (new SEOToolsService)->getSEOFields($this->instance);
        $row = TranslatableService::getTranslatableFields($this->instance->translatable, $this->instance);

        return view('backend.jobs.edit', compact('row'));
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

        return redirect()->route('jobs.index')->with('success','job updated successfully');
    }


    public function destroy($id)
    {
        $this->instance = $this->findById($id);
        (new SEOToolsService)->deleteRelatedSEOTool($this->instance);

        $this->delete($id);

        return redirect()->route('jobs.index')->with('success','job deleted successfully');
    }

    public function bulkDestroy($ids)
    {
        $this->destroyAll($ids);
        return redirect()->route('jobs.index')->with('success','jobs deleted successfully');
    }
}
