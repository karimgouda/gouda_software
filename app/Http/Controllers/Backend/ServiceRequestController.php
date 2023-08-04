<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ServiceRequestDataTable;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;

class ServiceRequestController extends Controller
{
    public function index(ServiceRequestDataTable $dataTable)
    {
        return $dataTable->render('backend.service_request.index');
    }

    public function destroy($id)
    {
        $model = ServiceRequest::findOrFail($id);
        $model->delete();
        return redirect()->back()->with('success','deleted successfully');
    }
}
