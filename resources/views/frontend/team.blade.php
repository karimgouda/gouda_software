@extends('frontend.layouts.app')
@section('title')
{{translate('our team')}}
@endsection
@section('content')
<div class="container-xxl py-5 bg-primary hero-header">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated slideInDown">{{translate('Our Team')}}</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">{{translate('Home')}}</a></li>
                        {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                        <li class="breadcrumb-item text-white active" aria-current="page">{{translate('Our Team')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>



<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>{{translate('Our Team')}}<span></span></p>
            <h1 class="text-center mb-5">{{translate('Our Team Members')}}</h1>
        </div>
        <div class="row g-4">
            @foreach ($employees as $employee)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light rounded">
                    <div class="text-center border-bottom p-4">
                        <img class="img-fluid rounded-circle mb-4" src="{{asset($employee->image)}}" alt="">
                        <h5>{{$employee->title}}</h5>
                        <span>{{strip_tags($employee->description)}}</span>
                    </div>
                    <div class="d-flex justify-content-center p-4">
                        <a class="btn btn-square mx-1" href="{{$employee->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square mx-1" href="{{$employee->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->

@endsection
