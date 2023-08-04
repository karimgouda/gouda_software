<?php

namespace App\Http\Interfaces;

use App\Models\Recruitment;
use App\Interfaces\BaseInterface;

interface RecruitmentInterface
{
    public function index($dataTable);
    public function show($id);
    public function store($request);
    public function update($id,$status);
    public function destroy($id);
    public function bulkDestroy($ids);
    public function downloadCv(Recruitment $recruitment);
}
