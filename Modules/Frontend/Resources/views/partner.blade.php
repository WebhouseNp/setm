@extends('frontend::layouts.master')
@section('title','Our Partners')
@section('content')
   <!-- ======= Main Start ======= -->
<main id="main">


    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($dashboard_site->partner_banner))
            {{ Storage::url($dashboard_site->partner_banner) }}
        @else
            {{ asset('images/banner.jpg') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">{!! $dashboard_site->partner_banner_title !!}</h2>
                    <p>
                        {{ html_entity_decode(strip_tags($dashboard_site->partner_banner_subtitle)) }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Banner End ======= -->

    <section class="py-3 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h3 class="mt-3 aos-init partner-article-heading aos-animate" data-aos="fade-down" data-aos-delay="700">
                        {{ html_entity_decode(strip_tags($dashboard_site->partner_left_description)) }}
                    </h3>
                </div>
                <div class="col-md-8 col-12 aos-init" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">
                    <div class="feature-box">
                        <p class="mt-3 aos-init">
                            {{ html_entity_decode(strip_tags($dashboard_site->partner_right_description)) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <!-- Partner Carousel Start -->
    <section class="py-3 py-lg-5 partner-slide">
        <div class="container">
             <header class="section-header wow fadeInUp">
                <h3>Our Partners</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                <p>Our partners are our great supporter.</p>
            </header>
            <div class="owl-carousel owl-theme aos-init" data-aos="fade-up" data-aos-delay="700">
                @foreach($partners as $partner)
                    <div class="item mb-5">
                        <div class="card border-0 partner-card">
                            <div class="card-image">
                                @if(isset($partner->image))
                                <img src="{{ Storage::url($partner->image) }}" alt="" class="card-img img-fluid">
                                @else
                                <img style="height:150px" src="{{ asset('images/no_image.png') }}" alt="" class="card-img img-fluid">
                                @endif
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::title($partner->title) }}</h5>
                                <p class="card-description">
                                    {{html_entity_decode(strip_tags($partner->description))}}
                                </p>
                            <h5><i class="bi bi-geo-alt-fill"></i> {{ Str::title($partner->city) }} {{ Str::title($partner->country) }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Partner Carousel End -->

    <!-- Team up Start -->
    <section class="team-up">
        <div class="team-up-detail partner-detail">
             <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 aos-init" data-aos="fade-right" data-aos-delay="700">
                        <div class="partner-title">
                            <p>A Strong network of</p>
                            <h2>Strategic partners &amp; Technology Solution Providers </h2>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 aos-init" data-aos="fade-left" data-aos-delay="700">
                        <div class="partner-icon text-center">
                          <i class="fa fa-handshake-o" aria-hidden="true"></i>
                      </div>
                        <div class="btn-box partner-btn-box text-center partner-btn-box">
                            <button class="l-btn"> <a href="{{ route('contact') }}"> Become a Partner</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-up-box"></div>
    </section>
    <!-- Team up End -->

    <!-- Details Start -->
    <section class="py-3 py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center my-5 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                    <div class="feature-box">
                        <div class="feature-icon-box">
                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                        </div>
                        <h5 class="mt-3 mt-lg-5">Why partner with us ?</h5>
                        <p class="mt-3 mt-lg-4">
                            {{ html_entity_decode(strip_tags($dashboard_site->partner_with_us)) }}
                        </p>
                    </div>
                </div>

                <div class="col-sm-6 text-center my-5 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                    <div class="feature-box">
                        <div class="feature-icon-box">
                            <i class="fa fa-certificate" aria-hidden="true"></i>
                        </div>
                        <h5 class="mt-3 mt-lg-5">What do we offer?</h5>
                        <p class="mt-3 mt-lg-4">
                            {{ html_entity_decode(strip_tags($dashboard_site->our_offer)) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Details End -->



</main>
<!-- ======= Main End ======= -->
@endsection
