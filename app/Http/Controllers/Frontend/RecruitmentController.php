<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecruitmentRequest;
use App\Http\Interfaces\RecruitmentInterface;

class RecruitmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $recruitmentRepository;

    public function __construct(RecruitmentInterface $recruitmentRepository){
        $this->recruitmentRepository = $recruitmentRepository ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecruitmentRequest $request)
    {
        return $this->recruitmentRepository->store($request);
    }
}
