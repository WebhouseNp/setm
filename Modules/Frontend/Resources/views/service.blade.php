@extends('frontend::layouts.master')
@section('title','Services')
@section('content')
<!-- ======= Main Start ======= -->
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <!-- <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Our Partners</h2>
                <ol>
                    <li><a href="#">Home</a></li>
                    <li>Our Services</li>
                </ol>
            </div>
        </div>
    </section> -->
    <!-- End Breadcrumbs Section -->

    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($dashboard_site->service_banner))
            {{ Storage::url($dashboard_site->service_banner) }}
        @else
            {{ asset('images/banner.jpg') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">Cybersecurity Services</h2>
                    <p>
                        Protect your website, web server and web application against the increasing sophistication of hacker threats.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner End ======= -->

    <!-- ======= Services Section ======= -->
    <section class="services py-3 py-lg-5">
        <div class="container aos-init" data-aos="fade-up">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 box aos-init" data-aos="fade-up" data-aos-delay="100">
                        <div class="program-box">
                            <div class="program-icon-box">
                               <img src="{{ Storage::url($service->icon) }}" alt="" class="img-fluid card-img">
                            </div>
                            <div class="program-detail">
                                <h4><a href="{{ route('service.detail',$service->slug) }}">{{ $service->title }}</a></h4>
                                <p>{!! Str::limit($service->description,200)!!}</p>
                                <a href="{{ route('service.detail',$service->slug) }}" class="btn-details">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $services->links('pagination::bootstrap-4') }}
        </div>
    </section>
    <!-- End Services Section -->

</main>
<!-- ======= Main End ======= -->
@endsection
