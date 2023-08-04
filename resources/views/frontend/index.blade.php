@extends('frontend.layouts.app')

@section('title') Home  @endsection

 @section('content')

        <div class="container-xxl bg-primary hero-header">
                <div class="container px-lg-5">
                    <div class="row g-5 align-items-end">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated slideInDown">{{$sliders->title}}</h1>
                            <p class="text-white pb-3 animated slideInDown">{{strip_tags($sliders->description)}}</p>
                            <a href="{{route('about_us')}}" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">{{translate('Read More')}}</a>
                            <a href="{{route('contact_us')}}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">{{translate('Contact Us')}}</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid animated zoomIn" src="{{asset($sliders->image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>



        <!-- Feature Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="row g-4">
                    @foreach ($services as $service)

                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="feature-item bg-light rounded text-center p-4">
                            <img src="{{asset($service->image)}}" class="w-50 pb-4" alt="">
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
                                <p class="mb-2">{{translate('SEO  Backlinks')}}</p>
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
                        <a href="{{route('about_us')}}" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill mt-3">{{translate('Read More')}}</a>
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


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>{{translate('Our Services')}}<span></span></p>
                    <h1 class="text-center mb-5">{{translate('What Solutions We Provide')}}</h1>
                </div>
                <div class="row g-4">
                    @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column  text-center rounded">
                            <div class="service-icon flex-shrink-0  ">
                                {{-- <i class="fa fa-search fa-2x"></i> --}}
                                <img src="{{asset($service->image)}}" width="50" height="50"  alt="">
                            </div>
                            <h5 class="mb-3">{{$service->title}}</h5>
                            <p class="m-0">{{strip_tags($service->description)}}</p>
                            <a class="btn btn-square" href="{{route('service.details',$service->id)}}"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Service End -->




        <!-- Projects Start -->
        <div class="container-xxl py-5">
            <div class="container py-5 px-lg-5">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>{{translate('Our Projects')}}<span></span></p>
                    <h1 class="text-center mb-5">{{translate('Recently Completed Projects')}}</h1>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="mx-2 active" data-filter="*">{{translate('All')}}</li>
                            @foreach ($categories as $category)
                            <li class="mx-2"
                                    @foreach ($category->projects as $project_id)
                                    data-filter="#{{$project_id->id}}"
                                    @endforeach

                             >{{$category->name}}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container">

                    @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s" id="{{$project->id}}">
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


        <!-- Testimonial Start -->
        {{-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <p class="section-title text-secondary justify-content-center"><span></span>Testimonial<span></span></p>
                <h1 class="text-center mb-5">What Say Our Clients!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded my-4">
                        <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo justo.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" style="width: 65px; height: 65px;">
                            <div class="ps-4">
                                <h5 class="mb-1">Client Name</h5>
                                <span>Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Testimonial End -->


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


