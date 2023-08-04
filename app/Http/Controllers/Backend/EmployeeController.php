<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\EmployeeDataTable;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\BulkDestroyRequest;
use App\Http\Interfaces\EmployeeInterface;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class EmployeeController extends Controller
{
    private $employeeInterface;

    public function __construct(EmployeeInterface $employeeInterface){
        $this->employeeInterface = $employeeInterface ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeeDataTable $dataTable)
    {
        return $this->employeeInterface->index($dataTable);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->employeeInterface->show($id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        return $this->employeeInterface->store($request);
    }

    public function create()
    {
        return $this->employeeInterface->create();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->employeeInterface->edit($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        return $this->employeeInterface->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->employeeInterface->destroy($id);
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(BulkDestroyRequest $request)
    {
        $ids = $request->ids;
        return $this->employeeInterface->bulkDestroy($ids);
    }
}
