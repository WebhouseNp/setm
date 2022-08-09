@extends('frontend::layouts.master')
@section('title',$service->title)
@section('content')

<!-- ======= Main Start ======= -->
<main id="main">

    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($service->service_inner_banner))
            {{ Storage::url($service->service_inner_banner) }}
        @else
            {{ asset('images/logo.png') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">{{ $service->title }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner End ======= -->
        <!-- alerts -->
    @if (session('message'))

        <div class="text-center alert alert-primary alert-dismissible text-capitalize" id="successMessage" style="z-index: 999;">
            <a href="#" data-dismiss="alert" aria-label="close"></a>
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="text-center alert alert-danger alert-dismissible text-capitalize" id="errorMessage">
            <a href="#" data-dismiss="alert" aria-label="close"></a>
                <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ======= Product Details Section ======= -->
    <section class="py-3 service-details py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h4 class="mt-3">{{ $service->title }}</h4>

                    <p>{!! $service->description !!}</p>

                    <img style="margin-bottom:10px" src="{{ Storage::url($service->image) }}" alt="{{ Str::title($service->title) }}" class="img-fluid card-img">
                        <p>                       {!! $service->service_full_description !!}
                        </p>                     
<!-- inquiry form start -->
                    <div class="mt-4 inquiry-card">
                        <h5 class="inquiry-title">Request This Service</h5>
                        <form class="inquiry-form" method="POST" action="{{ route('serviceInquire') }}">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="tel" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="4" class="form-control" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-team">Submit Request</button>
                        </form>
                    </div>
                    <!-- inquiry form end -->
                </div>

                <div class="col-lg-4 col-sm-12 aos-init" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                    <h4 class="mb-0 font-weight-bolder">Related Services</h4>
                    <hr>
                    @foreach($recentServices as $recentService)
                        <div style="margin-top:5px;" class="mb-3 border-0 card related-card mb-lg-5">
                            <div class="row">
                                <div class="col-4">
                                    @if(isset($recentService->image))
                                    <img src="{{ Storage::url($recentService->image) }}" alt="" class="card-img img-fluid">
                                    @else
                                    <img src="{{ asset('images/no_image.png') }}" alt="" class="card-img img-fluid">
                                    @endif
                                </div>
                                <div class="col-8">
                                    <h6 class="mb-1">{{ $recentService->title }}</h6>
                                    <p>
                                        {!! Str::limit($recentService->description,60) !!}
                                    </p>
                                    <a href="{{ route('service.detail',$recentService->slug) }}" class="btn card-link">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach




                </div>
            </div>
        </div>
    </section>
    <!-- ======= Product Details Section End ======= -->

</main>
<!-- ======= Main End ======= -->
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#errorMessage").delay(2000).slideUp(500);
            $("#successMessage").delay(4000).slideUp(500);
        });

    </script>
@endpush
@endsection
