@extends('frontend::layouts.master')
@section('title','Privacy Policy')
@section('content')

<!-- ======= Main Start ======= -->
<main id="main">

    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($detailprivacypolicy->image))
            {{ Storage::url($detailprivacypolicy->image) }}
        @else
            {{ asset('images/logo.png') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">Privacy Policy</h2>
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
                    <h4 class="mt-3">Privacy Policy</h4>
                    
                    @if (isset($detailprivacypolicy))
                        <p>{!! $detailprivacypolicy->description !!}</p>
                        
                        @if (isset($detailprivacypolicy->image))
                            <img src="{{ Storage::url($detailprivacypolicy->image) }}" alt="" class="img-fluid mb-3">
                        @endif

                        <p>{!! $detailprivacypolicy->page_full_description !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Product Details Section End ======= -->

</main>
<!-- ======= Main End ======= -->


@endsection
