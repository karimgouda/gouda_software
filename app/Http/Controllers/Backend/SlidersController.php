<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SlidersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\SlidersInterface;
use App\Http\Requests\BulkDestroyRequest;
use App\Http\Requests\SlidersRequest;

class SlidersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $SlidersInterface;

    public function __construct(SlidersInterface $SlidersInterface){
        $this->SlidersInterface = $SlidersInterface ;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return $this->SlidersInterface->edit();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlidersRequest $request, $id)
    {
        return $this->SlidersInterface->update($request,$id);
    }



}
