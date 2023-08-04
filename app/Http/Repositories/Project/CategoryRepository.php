<?php

namespace App\Http\Repositories\Project;

use App\Http\Interfaces\Project\CategoryInterface;
use App\Models\ProjectCategory;
use App\Services\BaseEloquentService;
use App\Services\TranslatableService;

class CategoryRepository extends BaseEloquentService implements CategoryInterface
{

    protected $modelName = ProjectCategory::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }


    public function index($dataTable)
    {
        return $dataTable->render('backend.projects.categories.index');
    }


    public function create()
    {
        return view('backend.projects.categories.create');
    }


    public function store($request)
    {
        $translatableFields = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $request->validated());
        $this->executeSave($translatableFields);

        return redirect()->route('projects.categories.index')->with('success','category created successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $this->instance = $this->findById($id);
        $row = TranslatableService::getTranslatableFields($this->instance->translatable, $this->instance);
        return view('backend.projects.categories.edit', compact('row'));
    }


    public function update($request, $id)
    {
        $this->instance = $this->findById($id);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $request->validated());

        $this->executeSave($translatableFields);

        return redirect()->route('projects.categories.index')->with('success','category updated successfully');
    }


    public function destroy($id)
    {
        $this->delete($id);
        return redirect()->route('projects.categories.index')->with('success','category deleted successfully');
    }

    public function bulkDestroy($ids)
    {
        $this->destroyAll($ids);
        return redirect()->route('projects.categories.index')->with('success','categories deleted successfully');
    }
}
