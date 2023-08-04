<?php

namespace App\Http\Repositories;

use App\Models\Contact;
use App\Services\ImageService;
use App\Services\BaseEloquentService;
use App\Services\SEO\SEOToolsService;
use App\Services\TranslatableService;
use App\Http\Interfaces\RecruitmentInterface;
use App\Models\Recruitment;

class RecruitmentRepository extends BaseEloquentService implements RecruitmentInterface
{

    protected $modelName = Recruitment::class;

    public function __construct()
    {
        $this->instance = $this->getNewInstance();
    }


    public function index($dataTable)
    {
        return $dataTable->render('backend.recruitments.index');
    }


    public function show($id)
    {
        $row = $this->findById($id);
        return view('backend.recruitments.show', compact('row'));
    }

    public function store($request)
    {
        $requestData = $request->validated();
        $requestData['cv'] = $requestData['cv']->store('CVs');

        $this->executeSave($requestData);
        return redirect()->back()->with('success','Thank you, our team will contact you');
    }

    public function update($request, $id)
    {
        $this->instance = $this->findById($id);

        $requestData = $request->validated();
        if($request->hasFile('image')) $requestData = (new ImageService)->handleImageDetails(request: $request, imageKey: 'image', path: $this->instance->filesPath);

        $translatableFields     = TranslatableService::generateTranslatableFields($this->instance->getTranslatableFields(), $requestData);
        $nonTranslatableFields  = TranslatableService::getNonTranslatableFields($this->instance, $requestData);

        $model = $this->executeSave(array_merge($nonTranslatableFields, $translatableFields));
        (SEOToolsService::withRequestAndModel($request, $model))->updateRelatedSEOTool();

        return redirect()->route('recruitments.index')->with('success','recruitment updated successfully');
    }


    public function destroy($id)
    {
        $this->delete($id);
        return redirect()->route('recruitments.index')->with('success','recruitment deleted successfully');
    }

    public function bulkDestroy($ids)
    {
        $this->destroyAll($ids);
        return redirect()->route('recruitments.index')->with('success','recruitments deleted successfully');
    }

    public function downloadCv(Recruitment $recruitment)
    {
        $ext        = pathinfo($recruitment->cv, PATHINFO_EXTENSION);
        $fullPath   = storage_path('app/' . $recruitment->cv);
        $username   = str_replace(" ", "_", $recruitment->name);

        return file_exists($fullPath) ? response()->download( $fullPath, "{$username}_CV.{$ext}" ) : abort(404);
    }
}
