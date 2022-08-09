@extends('frontend::layouts.master')
@section('title','About Us')
@section('content')
@php
$site = \Modules\Site\Entities\Site::latest()->first();
@endphp
<!-- ======= Main Start ======= -->
<main id="main">

    <!-- About Main Content -->
    <section class="about-inner" style="background-image:url(
        @if (isset($dashboard_site->aboutus_banner))
            {{ Storage::url($dashboard_site->aboutus_banner) }}
        @else
            {{ asset('images/banner.jpg') }}
        @endif
        )">
    {{-- <section class="about-inner"> --}}
        <div class="container">
            <header class="section-header">
                <h3>
                            {!! $site->who_we_are1 !!}

                </h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>

                    <div class="who-we aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                        {!! $site->who_we_are !!}
                    </div>

                    <ul class="text-white aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                        {{-- <li>Microsoft Certified Professional in Windows Server 2012</li>
                        <li>Qualys Certified Specialist in Vulnerability Management</li>
                        <li>Institute of Information Security – Certified Professional Forensic Analyst</li>
                        <li>Institute of World Politics – Certified Intelligence Professional</li>
                        <li>CompTIA Security+ Certification (SY0-601)</li>
                        <li>CompTIA CySA+ Certification (CS0-002)</li>
                        <li>McAfee Institute Certified Cyber Intelligence Investigator (CCII)</li> --}}
                    </ul>
                </p>
            </header>

        </div>
    </section>
    <!-- About Main Content End -->

    <!-- Our Mission Start -->
    <section class="mission">
        <div class="full-section-shape">
            <img src="{{ asset('frontend/img/wavy.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <header class="section-header inner-section-header">
                    <h3>
                        {!! $site->our_mission_title1 !!}
                    </h3>
                    <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                </header>
                <div class="col-lg-7 col-sm-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="2000">
                    <!--<p class="mt-4">-->
                    <!--    Our mission is to provide cyber security solutions for digital infrastructure by implementing latest technologies, upgrading your policies standards, and guiding to follow a proper principle.-->
                    <!--</p>-->
                    <ul class="about-check-list">
                        {!! $site->our_mission_title !!}
                    </ul>
                        <!--<li>Our mission at LOKSEC is to provide latest solutions with ingenuity, creativity, and innovation.</li>-->
                        <!--<li>LOKSEC brings imagination and innovation to your digital infrastructure by providing latest solutions.</li>-->
                        <!--<li>LOKSEC offers a unique consulting experience for you and your company by providing the best cyber security solutions.</li>-->
                        <!--<li>LOKSEC is dedicated to the highest quality in cyber security delivered with innovation and imagination.</li>-->
                        <!-- <li>Our mission is to provide cyber security solutions for digital infrastructure by implementing latest technologies, upgrading your policies standards, and guiding to follow a proper principle.</li> -->
                     <!--</ul>-->
                </div>
                <div class="col-lg-5 col-sm-12 aos-init" data-aos="fade-left" data-aos-delay="300" data-aos-duration="3000">
                    @if(isset($site->our_mission))
                    <img src="{{ Storage::url($site->our_mission) }}" alt=""class="about-mission-image">
                    @else
                    <img src="{{ asset('images/about.jpg') }}" alt=""class="mt-4 img-fluid">
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- Our Mission End -->

    <!-- Our Mission Start -->
    <section class="mission">
        <div class="container">
            <div class="row">
                      <div class="col-lg-5 col-sm-12 aos-init" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        <img src="{{ Storage::url($site->our_logo) }}" alt="LOKSEC" class="img-fluid">
                    </div>
                <div class="col-lg-7 col-sm-12 aos-init" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000">
                    <header class="section-header inner-section-header">
                        <h3>
                            {!! $site->our_logo_title1 !!}
                        </h3>
                        <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                    </header>

                    <p class="mt-4">
                        {!! $site->our_logo_title !!}
                    </p>

                </div>

            </div>
        </div>
    </section>
    <!-- Our Mission End -->

    

</main>
<!-- ======= Main End ======= -->
@endsection

<script>
    $(document).ready(function(){
        $(".testimonial-carousel .owl-carousel").owlCarousel({
            nav: true,
            navText: [
                '<i class="fa fa-angle-left"></i>',
                '<i class="fa fa-angle-right"></i>'
            ],
            margin:20,
            dots: false,
            responsiveClass: true,
            autoplay: false,
            autoplaySpeed: 3000,
            navSpeed: 2000,
            loop: true,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:1,
                },
                1000:{
                    items:1,
                }
            }
        });
    });

</script>
