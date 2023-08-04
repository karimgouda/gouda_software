<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\RecruitmentDataTable;
use App\Http\Requests\BulkDestroyRequest;
use App\Http\Interfaces\RecruitmentInterface;
use App\Http\Requests\RecruitmentRequest;
use App\Models\Recruitment;

class RecruitmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $recruitmentRepository;

    public function __construct(RecruitmentInterface $recruitmentRepository) {
        $this->recruitmentRepository = $recruitmentRepository;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RecruitmentDataTable $dataTable)
    {
        return $this->recruitmentRepository->index($dataTable);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->recruitmentRepository->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecruitmentRequest $request, $id)
    {
        return $this->recruitmentRepository->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->recruitmentRepository->destroy($id);
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
        return $this->recruitmentRepository->bulkDestroy($ids);
    }

    /**
     * Download the specified resource's cv from storage
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadCv(Recruitment $recruitment)
    {
        return $this->recruitmentRepository->downloadCv($recruitment);
    }
}
