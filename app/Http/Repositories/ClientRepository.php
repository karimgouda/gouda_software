<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ClientInterface;
use App\Models\Client;
use App\Services\ImageService;
use App\Services\BaseEloquentService;
use App\Services\TranslatableService;

class ClientRepository extends BaseEloquentService implements ClientInterface
{
    protected $modelName = Client::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }


    public function index($dataTable)
    {
        return $dataTable->render('backend.clients.index');
    }

    public function create()
    {
        return view('backend.clients.create');
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

        return redirect()->route('clients.index')->with('success','Client created successfully');
    }

    public function edit($id)
    {
        $this->instance = $this->findById($id);
        $row = TranslatableService::getTranslatableFields($this->instance->translatable, $this->instance);

        return view('backend.clients.edit', compact('row', 'id'));
    }


    public function update($request, $id)
    {
        $this->instance = $this->findById($id);

        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);

        $this->executeSave(array_merge($nonTranslatableFields, $translatableFields));

        return redirect()->route('clients.index')->with('success','Client updated successfully');
    }

    public function destroy($id)
    {
        $this->delete($id);
        return redirect()->route('clients.index')->with('success','Client deleted successfully');
    }

    public function bulkDestroy($ids)
    {
        $this->destroyAll($ids);
        return redirect()->route('clients.index')->with('success','Clients deleted successfully');
    }
}
