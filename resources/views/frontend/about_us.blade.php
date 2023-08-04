@extends('frontend.layouts.app')

@section('title')
{{translate('about_us')}}
@endsection

@section('content')
<div class="container-xxl py-5 bg-primary hero-header">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated slideInDown">{{translate('About Us')}}</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">{{translate('Home')}}</a></li>
                        {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                        <li class="breadcrumb-item text-white active" aria-current="page">{{translate('About')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-4">
            @foreach ($services as $service)
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="feature-item bg-light rounded text-center p-4">
                    <img src="{{asset($service->image)}}"  width="50" height="50" alt="">
                    <h5 class="mb-3">{{$service->title}}</h5>
                    <p class="m-0">{{strip_tags($service->description)}}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Feature End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary">{{translate('About Us')}}<span></span></p>
                <h1 class="mb-5">{{$about_us->company_name}}</h1>
                <p class="mb-4">{{strip_tags($about_us->description)}}</p>

                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">{{translate('SEO Backlinks')}}</p>
                        <p class="mb-2">{{settings('seo')}}%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="{{settings('seo')}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="skill mb-4">
                    <div class="d-flex justify-content-between">
                        <p class="mb-2">{{translate('Design  Development')}}</p>
                        <p class="mb-2">{{settings('dev')}}%</p>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="{{settings('dev')}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <a href="" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">{{translate('Read More')}}</a>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset($about_us->image)}}">
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-xxl bg-primary fact py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-certificate fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{settings('exp')}}</h1>
                <p class="text-white mb-0">{{translate('Years Experience')}}</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-users-cog fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{settings('team')}}</h1>
                <p class="text-white mb-0">{{translate('Team Members')}}</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{settings('client')}}</h1>
                <p class="text-white mb-0">{{translate('Satisfied Clients')}}</p>
            </div>
            <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-check fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{settings('project')}}</h1>
                <p class="text-white mb-0">{{translate('Compleate Projects')}}</p>
            </div>
        </div>
    </div>
</div>
<!-- Facts End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Our Team<span></span></p>
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
