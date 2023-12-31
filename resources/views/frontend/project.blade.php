@extends('frontend.layouts.app')
@section('title')
{{'projects'}}
@endsection
@section('content')
<div class="container-xxl py-5 bg-primary hero-header">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated slideInDown">{{translate('Project')}}</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">{{translate('Home')}}</a></li>
                        {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                        <li class="breadcrumb-item text-white active" aria-current="page">{{translate('Project')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Our Projects<span></span></p>
            <h1 class="text-center mb-5">Recently Completed Projects</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">{{translate('All')}}</li>
                    @foreach ($categories as $category)
                    <li class="mx-2"
                    @foreach ($category->projects as $project)
                    data-filter="#{{$project->id}}"
                    @endforeach
                    >{{$category->name}}</li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="row g-4 portfolio-container">
            @foreach ($projects as $project)
            <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" id="{{$project->id}}" data-wow-delay="0.1s">
                <div class="rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{asset($project->image)}}" alt="">
                        <div class="portfolio-overlay">
                            <a class="btn btn-square btn-outline-light mx-1" href="{{asset($project->image)}}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="bg-light p-4">
                        <p class="text-primary fw-medium mb-2">{{$project->name}}</p>
                        <h5 class="lh-base mb-0">{{strip_tags($project->description)}}</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Projects End -->

@endsection
