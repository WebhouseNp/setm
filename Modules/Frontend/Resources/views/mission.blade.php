@extends('frontend::layouts.master')
@section('title','Mission')
@section('content')

<!-- banner section start here -->
<div class="page-header bg_img" style="background-image: url(frontend/images/banner/page-header/01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                <div class="page-header-area">
                    <h3 class="page-header-title">Mission & Vision</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="mb-0 bg-transparent breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mission & Vision</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section ending here -->

<!-- pasent care section start here -->
<div class="pasent-care padding-tb">
    <div class="container">
        <div class="flex-row-reverse row justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="pc-thumb">
                    <img src="{{ Storage::url($mission->mission_image) }}" alt="care">
                    <div class="pct-content">
                        <div class="flex-wrap pctc-area d-flex align-items-center">
                            <ul class="flex-wrap lab-ul d-flex list-pct">
                                <li><i class="icofont-heart-beat-alt"></i>Qualified Doctors</li>
                                <li><i class="icofont-heart-beat-alt"></i>Qualified Doctors</li>
                                <li><i class="icofont-heart-beat-alt"></i>24×7 Emergency Services</li>
                                <li><i class="icofont-heart-beat-alt"></i>24×7 Emergency Services</li>
                                <li><i class="icofont-heart-beat-alt"></i>General Medical</li>
                                <li><i class="icofont-heart-beat-alt"></i>General Medical</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="pc-content">
                    <div class="pc-title">
                        <h2>Our <span class="theme-color">Mission</span></h2>
                    </div>
                    <div class="pc-details">
                        <p>
                            {!! $mission->mission !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 mt-4">
                <div class="pc-content">
                    <div class="pc-title">
                        <h2>Our <span class="theme-color">Vision</span></h2>
                    </div>
                    <div class="pc-details">
                        {!! $mission->vision !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 mt-4">
                <div class="pc-thumb">
                    <img src="{{ Storage::url($mission->vision_image) }}" alt="care">
                    <div class="pct-content">
                        <div class="flex-wrap pctc-area d-flex align-items-center">
                            <ul class="flex-wrap lab-ul d-flex list-pct">
                                <li><i class="icofont-heart-beat-alt"></i>Qualified Doctors</li>
                                <li><i class="icofont-heart-beat-alt"></i>Qualified Doctors</li>
                                <li><i class="icofont-heart-beat-alt"></i>24×7 Emergency Services</li>
                                <li><i class="icofont-heart-beat-alt"></i>24×7 Emergency Services</li>
                                <li><i class="icofont-heart-beat-alt"></i>General Medical</li>
                                <li><i class="icofont-heart-beat-alt"></i>General Medical</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pasent care section ending here -->

<!-- Contact section start here -->
@include('frontend::includes.repeted-form')
@endsection
