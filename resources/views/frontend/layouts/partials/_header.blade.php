     <!-- Navbar & Hero Start -->
     <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{route('index')}}" class="navbar-brand p-0">
                <h1 class="m-0">{{translate('Gouda')}}</h1>
                 {{-- <img src="{{asset(settings('app_logo'))}}" alt="Logo"> --}}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="{{route('index')}}" class="nav-item nav-link active">{{translate('Home')}}</a>
                    <a href="{{route('about_us')}}" class="nav-item nav-link">{{translate('About')}}</a>
                    <a href="{{route('services')}}" class="nav-item nav-link">{{translate('Service')}}</a>
                    <a href="{{route('project')}}" class="nav-item nav-link">{{translate('Project')}}</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{translate('Pages')}}</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{route('team')}}" class="dropdown-item">{{translate('Our Team')}}</a>
                            {{-- <a href="testimonial.html" class="dropdown-item">{{translate('Testimonial')}}</a> --}}
                            {{-- <a href="404.html" class="dropdown-item">404 Page</a> --}}
                        </div>
                    </div>
                    <a href="{{route('contact_us')}}" class="nav-item nav-link">{{translate('Contact')}}</a>
                    @if(app()->getLocale() == 'ar')
                    <a href="{{LaravelLocalization::getLocalizedURL('en')}}" class="nav-item nav-link">English</a>
                    @else
                    <a href="{{LaravelLocalization::getLocalizedURL('ar')}}" class="nav-item nav-link">العربيه</a>

                    @endif

                </div>
                <a href="{{route('services')}}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">{{translate('Get Started')}}</a>
            </div>
        </nav>
     </div>
    <!-- Navbar & Hero End -->
