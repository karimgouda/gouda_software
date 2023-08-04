@extends('frontend.layouts.app')
@section('title')
{{translate('Package')}}
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('frontend/css/package.css')}}">
@endpush
@section('content')

<div class="container py-5 bg-primary hero-header">
    <div class="container my-5 py-5 px-lg-5">
        <div class="row g-5 py-5">
            <div class="col-12 text-center">
                <h1 class="text-white animated slideInDown"> {{$service->title}} {{translate('package')}}</h1>
                <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="{{route('index')}}">{{translate('Home')}}  </a></li>

                        <li class="breadcrumb-item text-white active" aria-current="page">{{$service->title}} {{translate('package')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class='container'>
    <!-- Card 3 -->
    <div class='container__card mx-auto'>
      <div class='container__cardSvgs' style='background-color: var(--color5)'>
        <svg class='container__cardSvg1' version='1.2' baseProfile='tiny-ps' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 681 446' width='226' height='148'>
          <g id='Left Table'>
            <g id='&lt;Group&gt;'>
              <path id='&lt;Compound Path&gt;' fill-rule='evenodd' style='fill: #ffffff' d='M545.63 445.16L478.15 445.16C478.09 445.12 478.02 445.1 477.96 445.1C477.9 445.1 477.85 445.11 477.8 445.12C477.62 445.14 477.44 445.16 477.26 445.16C468.28 445.16 460.98 437.85 460.98 428.87C460.98 419.89 468.28 412.58 477.26 412.58C477.45 412.58 477.63 412.6 477.82 412.63L478.17 412.68L483.17 412.58L485.06 412.58C493.55 412.28 500.2 405.42 500.2 396.96C500.2 388.3 493.16 381.26 484.5 381.26L448.81 381.24C422.64 393.35 394.57 399.5 365.52 399.5C255.5 399.5 166.01 309.99 166.01 199.98C166.01 196.73 166.08 193.47 166.24 190.25L43.55 190.25L43.26 190.22C43.11 190.23 42.95 190.25 42.78 190.25C34.95 190.25 28.58 183.88 28.58 176.05C28.58 168.21 34.95 161.84 42.78 161.84C42.95 161.84 43.11 161.86 43.26 161.88L43.57 161.92L47.93 161.84L49.58 161.84C56.93 161.58 62.7 155.62 62.7 148.28C62.7 140.78 56.59 134.68 49.09 134.68L15.23 134.66C15.08 134.65 14.97 134.65 14.87 134.65C14.68 134.65 14.57 134.66 14.45 134.66C6.62 134.66 0.25 128.29 0.25 120.46C0.25 112.62 6.62 106.25 14.45 106.25C14.62 106.25 14.77 106.27 14.93 106.29L15.24 106.33L142.2 106.25C149.74 106.75 155.63 112.96 155.63 120.46C155.63 127.96 149.74 134.16 142.21 134.58L129.3 134.66C129.15 134.68 129.04 134.68 128.95 134.68C128.84 134.68 128.75 134.67 128.68 134.65L128 134.68C120.57 134.68 114.8 140.66 114.8 148.28C114.8 155.62 120.57 161.58 127.93 161.84L169.68 161.84C187.8 68.31 270.12 0.46 365.52 0.46C475.53 0.46 565.03 89.96 565.03 199.98C565.03 229.5 558.71 257.94 546.24 284.54L569.98 284.54C578.85 284.67 586.06 291.96 586.06 300.82C586.06 309.67 578.85 316.97 569.99 317.09L551.54 317.12C542.94 317.12 535.9 324.16 535.9 332.82C535.9 341.29 542.54 348.16 551.03 348.46L576.26 348.46C576.34 348.44 576.46 348.42 576.6 348.42L665.58 348.46C674.06 349.21 680.68 356.31 680.68 364.74C680.68 373.17 674.06 380.28 665.6 380.91L631.18 381.03L630.91 381.07C630.33 381.15 629.75 381.23 629.14 381.23L546.54 381.24C537.95 381.26 530.91 388.3 530.91 396.96C530.91 405.6 537.95 412.64 546.6 412.64L546.62 412.77C554.87 413.72 561.04 420.57 561.04 428.87C561.04 437.48 554.28 444.59 545.65 445.07L545.63 445.07L545.63 445.16ZM365.52 9.49C314.64 9.49 266.81 29.31 230.83 65.29C194.85 101.27 175.03 149.1 175.03 199.98C175.03 250.85 194.85 298.69 230.83 334.67C266.81 370.65 314.65 390.46 365.52 390.46C416.39 390.46 464.23 370.65 500.2 334.67C536.18 298.68 556 250.84 556 199.98C556 149.11 536.18 101.28 500.2 65.29C464.23 29.31 416.4 9.49 365.52 9.49Z' />
            </g>
          </g>
        </svg>

        <svg class='container__cardSvg2' version='1.2' baseProfile='tiny-ps' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 112 44' width='38' height='15'>
          <g id='Left Table'>
            <g id='&lt;Group&gt;'>
              <path id='&lt;Compound Path&gt;' fill-rule='evenodd' style='fill: #ffffff' d='M111.85 36.26C111.85 40 108.95 43.02 105.29 43.29L105.29 43.35L22.21 43.35L22.21 43.31C22.08 43.32 21.96 43.35 21.82 43.35C17.9 43.35 14.73 40.18 14.73 36.26C14.73 32.35 17.9 29.17 21.82 29.17C21.96 29.17 22.08 29.21 22.21 29.22L22.21 29.17L24.44 29.17L24.44 29.14C24.55 29.15 24.67 29.16 24.79 29.17L25.28 29.17C29.08 29.04 32.12 25.94 32.12 22.12C32.12 18.2 28.94 15.03 25.03 15.03L25.07 15.02L7.78 15.02L7.78 14.98C7.65 14.99 7.52 15.02 7.38 15.02C3.47 15.02 0.3 11.85 0.3 7.93C0.3 4.02 3.47 0.85 7.38 0.85C7.52 0.85 7.65 0.88 7.78 0.88L7.78 0.85L89.14 0.85L89.14 0.85C93.03 0.87 96.19 4.03 96.19 7.93C96.19 11.83 93.03 15 89.14 15.01L89.14 15.02L80.99 15.02L81.04 15.03C77.12 15.03 73.95 18.2 73.95 22.12C73.95 25.94 76.99 29.04 80.79 29.17L105.29 29.17L105.29 29.23C108.95 29.5 111.85 32.53 111.85 36.26ZM24.44 15.03L25.03 15.03C24.83 15.03 24.64 15.07 24.44 15.09L24.44 15.03Z' />
            </g>
          </g>
        </svg>

        <img src="{{asset($service->image)}}" class="w-0" alt="">

        {{-- <svg class='container__cardSvg3' version='1.2' baseProfile='tiny-ps' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 153 138' width='51' height='46'>
          <g id='Right Table'>
            <g id='&lt;Group&gt;'>
              <g id='&lt;Group&gt;'>
                <g id='&lt;Group&gt;'>
                  <path id='&lt;Compound Path&gt;' fill-rule='evenodd' style='fill: #2c3233' d='M152.4 53.66L152.39 111.2C152.38 116.75 147.89 121.25 142.34 121.26L69.15 121.26C67.33 121.26 65.8 122.78 65.79 124.6L65.8 137.18L59.09 137.18L59.09 124.6C59.11 119.06 63.6 114.57 69.15 114.56L142.34 114.56C144.16 114.54 145.69 113.02 145.69 111.2L145.69 53.66C145.69 51.84 144.16 50.3 142.34 50.3L107.87 50.3C107.34 59.29 104.79 67.42 100.73 73.66C96.47 80.25 90.27 84.87 83.05 85.4L83.05 85.5C83.03 85.5 81.74 85.5 81.73 85.5C81.71 85.5 47.37 85.5 47.35 85.5C45.89 89.25 42.28 91.9 38.01 91.92L28.79 91.92C23.24 91.9 18.75 87.42 18.74 81.87L18.74 68.47L4.2 68.47C2.36 68.47 0.85 66.95 0.85 65.11C0.85 63.26 2.36 61.75 4.2 61.75L18.74 61.75L18.74 33.83L4.2 33.83C2.36 33.83 0.85 32.32 0.85 30.47C0.85 28.63 2.36 27.12 4.2 27.12L18.74 27.12L18.74 10.22C18.75 4.67 23.24 0.17 28.79 0.16L38.01 0.16C42.94 0.17 47.01 3.72 47.87 8.4C47.88 8.4 81.72 8.4 81.73 8.4C81.74 8.4 83.04 8.4 83.05 8.4L83.05 8.5C90.27 9.03 96.47 13.66 100.73 20.23C104.79 26.49 107.34 34.61 107.87 43.59L142.34 43.6C147.89 43.61 152.38 48.1 152.4 53.66ZM41.36 10.22C41.36 8.4 39.83 6.87 38.01 6.86L28.79 6.86C26.97 6.87 25.44 8.4 25.43 10.22L25.43 81.87C25.44 83.69 26.97 85.21 28.79 85.22L38.01 85.22C39.83 85.21 41.36 83.69 41.36 81.87L41.36 10.22ZM76.34 78.79L76.34 15.1L48.2 15.1L48.2 78.79L76.34 78.79ZM101.28 46.96C101.28 37.82 98.83 29.6 95.11 23.88C91.68 18.66 87.43 15.7 83.05 15.2L83.05 78.7C87.43 78.2 91.68 75.24 95.11 70.01C98.83 64.3 101.28 56.08 101.28 46.96Z' />
                </g>
              </g>
            </g>
          </g>
        </svg> --}}
      </div>
      <div class='container__cardContent'>
        <h3 class='container__cardName'>{{$service->title}}</h3>


        @foreach ($service->service_details as $s_detail)
        <p class='container__cardDesc' >{{$s_detail->name}}</p>
        @endforeach
        <a href='{{route('checkout',$service->id)}}' class='container__cardLink' style='background-color: var(--color5)'>{{translate('GET STARTED')}}</a>
      </div>
    </div>
  </div>


@endsection