@extends('frontend::layouts.master')
@section('title','Terms of Service')
@section('content')

<!-- ======= Main Start ======= -->
<main id="main">

    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($termofService->image))
            {{ Storage::url($termofService->image) }}
        @else
            {{ asset('images/logo.png') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">Terms of Service</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner End ======= -->

    <!-- ======= Product Details Section ======= -->
    <section class="service-details py-lg-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                    <h4 class="mt-3">Terms of Service</h4>
                    
                    @if (isset($termofService))
                        <p>{!! $termofService->description !!}</p>

                        @if (isset($termofService->image))
                            <img src="{{ Storage::url($termofService->image) }}" alt="" class=" w-100 img-fluid mb-3">
                        @endif
                        
                        <p>{!! $termofService->page_full_description !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Product Details Section End ======= -->

</main>
<!-- ======= Main End ======= -->


@endsection

