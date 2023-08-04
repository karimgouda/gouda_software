<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ServiceDetailDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\ServiceDetailInterface;
use App\Http\Requests\ServiceDetailRequest;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{

    private $service_detail;

    public function __construct(ServiceDetailInterface $interface)
    {
        $this->service_detail = $interface;
    }

    public function index(ServiceDetailDataTable $dataTable)
    {
        return $this->service_detail->index($dataTable);
    }

    public function create()
    {
        return $this->service_detail->create();
    }

    public function store(ServiceDetailRequest $request)
    {
        return $this->service_detail->store($request);
    }
    public function edit($id)
    {
        return $this->service_detail->edit($id);
    }

    public function update($id , ServiceDetailRequest $request)
    {
        return $this->service_detail->update($id , $request);
    }

    public function destroy($id)
    {
        return $this->service_detail->destroy($id);
    }
}
