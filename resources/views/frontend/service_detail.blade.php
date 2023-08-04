@extends('frontend.layouts.app')
@section('title')
{{translate('Service_request')}}
@endsection

@section('content')


<div class="container-xxl py-5 bg-primary hero-header">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated slideInDown">{{translate('Service_request')}}</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">{{translate('Home')}}</a></li>
                        {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                        <li class="breadcrumb-item text-white active" aria-current="page">{{translate('Service_request')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Navbar & Hero End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
<div class="container py-5 px-lg-5">
    <div class="wow fadeInUp" data-wow-delay="0.1s">
        <p class="section-title text-secondary justify-content-center"><span></span>{{translate('Service_request')}}<span></span></p>
        <h1 class="text-center mb-5">{{translate('Request your service from gouda')}}</h1>
        {{-- <p class="text-center mb-4">{{$service->title}} <span class="text-warning"> ----> </span>{{$service->price}}{{translate('egp')}}</p> --}}
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="wow fadeInUp" data-wow-delay="0.3s">
                <form action="{{route('store',$service->id)}}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" id="name" placeholder="{{translate('Your Name')}}">
                                <label for="name">{{translate('Your Name')}}</label>
                                @error('name')
                                    <p class=" text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{translate('Your Email')}}">
                                <label for="email">{{translate('Your Email')}}</label>
                                @error('email')
                                    <p class=" text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="address" id="subject" placeholder="{{translate('Subject')}}">
                                <label for="subject">{{translate('address')}}</label>
                                @error('address')
                                    <p class=" text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input class="form-control" placeholder="{{translate('phone')}}" name="phone" id="message">
                                <label for="message">{{translate('phone')}}</label>
                                @error('phone')
                                    <p class=" text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">{{translate('Send Request')}}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Contact End -->

@endsection
