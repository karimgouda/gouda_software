<?php

namespace App\Http\Repositories\Project;

use Nette\Schema\Expect;
use Illuminate\Support\Arr;
use App\Services\ImageService;
use App\Services\SEO\SEOToolsService;
use App\Services\BaseEloquentService;
use App\Services\TranslatableService;
use App\Http\Interfaces\Project\CategoryInterface;
use App\Http\Interfaces\Project\ProjectInterface;
use App\Models\Project;

class ProjectRepository extends BaseEloquentService implements ProjectInterface
{
    protected $modelName = Project::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }


    public function index($dataTable)
    {
        return $dataTable->render('backend.projects.index');
    }


    public function create()
    {
        $categories =   app()->make(CategoryInterface::class)->getAll();
        return view('backend.projects.create',compact('categories'));
    }


    public function store($request)
    {
        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);
        $data = array_merge($nonTranslatableFields, $translatableFields);

        $model = $this->executeSave(Arr::except($data, 'categories'));
        if(isset($data['categories'])){
            $model->categories()->sync($data['categories']);
        }
        (SEOToolsService::withRequestAndModel($request, $model))->handleSEOToolsDetails();

        return redirect()->route('projects.index')->with('success','project created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $this->instance  = $this->findById($id,['categories']);

        $project_categories = $this->instance->categories;
        $row = TranslatableService::getTranslatableFields($this->instance->translatable, $this->instance);
        $row = array_merge($row, (new SEOToolsService)->getSEOFields($this->instance));
        $categories = app()->make(CategoryInterface::class)->getAll();

        return view('backend.projects.edit', compact('row','categories','project_categories'));
    }


    public function update($request, $id)
    {
        $this->instance = $this->findById($id);

        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);
        $data = array_merge($nonTranslatableFields, $translatableFields);

        $model = $this->executeSave(Arr::except($data, 'categories'));
        if(isset($data['categories'])){
            $model->categories()->sync($data['categories']);
        }
        (SEOToolsService::withRequestAndModel($request, $model))->updateRelatedSEOTool();

        return redirect()->route('projects.index')->with('success','project updated successfully');
    }


    public function destroy($id)
    {
        $this->instance = $this->findById($id);
        (new SEOToolsService)->deleteRelatedSEOTool($this->instance);

        $this->delete($id);
        return redirect()->route('projects.index')->with('success','project deleted successfully');
    }

    public function bulkDestroy($ids)
    {
        $this->destroyAll($ids);
        return redirect()->route('projects.index')->with('success','projects deleted successfully');
    }
}
