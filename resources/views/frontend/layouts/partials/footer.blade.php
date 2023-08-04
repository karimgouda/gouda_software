       <!-- Footer Start -->
       <div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5 px-lg-5">
            <div class="row g-5">

                <div class="col-md-6 col-lg-3">
                    
                    <p class="section-title text-white h5 mb-4">{{translate('Address')}}<span></span></p>
                    <p><i class="fa fa-map-marker-alt me-3"></i>{{settings('address_'.app()->getLocale())}}</p>
                    <p><i class="fa fa-phone-alt me-3"></i>{{settings('phone')}}</p>
                    <p><i class="fa fa-envelope me-3"></i>{{settings('email')}}</p>
                    <div class="d-flex pt-2">

                        {{-- <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a> --}}
                        <a class="btn btn-outline-light btn-social" href="{{settings('facebook')}}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{settings('instagrm')}}"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{settings('linkedin')}}"><i class="fab fa-linkedin-in"></i></a>
                    
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <p class="section-title text-white h5 mb-4">{{translate('Quick Link')}}<span></span></p>
                    <a class="btn btn-link" href="{{route('about_us')}}">{{translate('About Us')}}</a>
                    <a class="btn btn-link" href="{{route('contact_us')}}">{{translate('Contact Us')}}</a>
                    <a class="btn btn-link" href="">{{translate('Privacy Policy')}}</a>
                    <a class="btn btn-link" href="">{{translate('Terms  Condition')}}</a>
                    {{-- <a class="btn btn-link" href="">Career</a> --}}
                </div>
                {{-- <div class="col-md-6 col-lg-3">
                    <p class="section-title text-white h5 mb-4">{{translate('Gallery')}}<span></span></p>
                    @foreach (App\Models\Partner::get() as $partner)    
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid" src="{{asset($partner->image)}}" alt="Image">
                        </div>
                    </div>
                    @endforeach

                </div> --}}
                <div class="col-md-6 col-lg-3">
                    <p class="section-title text-white h5 mb-4">{{translate('Newsletter')}}<span></span></p>
                    <p>{{settings('app_description_'.app()->getLocale())}}</p>
                    {{-- <div class="position-relative w-100 mt-3">
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="container px-lg-5">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
                        
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                 
                </div>
            </div>
        </div> --}}
    </div>
    <!-- Footer End -->