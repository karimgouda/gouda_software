<?php
namespace App\Http\Repositories;

use App\Models\ServiceDetail;
use App\Services\BaseEloquentService;
use App\Services\TranslatableService;
use App\Http\Interfaces\ServiceDetailInterface;

class ServiceDetailRepository extends BaseEloquentService implements ServiceDetailInterface
{

    protected $modelName = ServiceDetail::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }

    public function index($dataTable)
    {
        return $dataTable->render('backend.services.service_detail.index');
    }
    public function show($id)
    {

    }

    public function create()
    {
        return view('backend.services.service_detail.create');
    }


    public function store($request)
    {
        $translatableFields  = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $request->validated());
        $this->executeSave($translatableFields);
        return redirect()->back()->with('success','created successfully');
    }
    public function edit($id)
    {
        $this->instance = $this->findById($id);
        $row = TranslatableService::getTranslatableFields($this->instance->translatable, $this->instance);
        return view('backend.services.service_detail.edit',compact('row'));
    }

    public function update($id , $request)
    {
        $this->instance = $this->findById($id);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $request->validated());

        $this->executeSave($translatableFields);

        return redirect()->route('service_detail.index')->with('success','updated successfully');
    }

    public function destroy($id)
    {
        $this->instance = $this->findById($id);
        $this->delete($id);
        return redirect()->back()->with('success','deleted successfully');
    }
    public function bulkDestroy($ids)
    {

    }
}
