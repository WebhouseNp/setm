@extends('frontend::layouts.master')
@section('title','Products')
@section('content')

<!-- ======= Main Start ======= -->
<main id="main">

    {{-- {{ asset('frontend/ ') }} --}}
    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($dashboard_site->product_banner))
            {{ Storage::url($dashboard_site->product_banner) }}
        @else
            {{ asset('images/banner.jpg') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">Cybersecurity Tools & Products</h2>
                    <p>
                        Protect your website, web server and web application against the increasing sophistication of hacker threats.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner End ======= -->

    <!-- ======= Product Section ======= -->
    <section class="products py-lg-5 py-3">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-12 mx-auto mb-4 aos-init" data-aos="fade-up" data-aos-delay="100">
                        <div class="card border-0 product-card">
                                @if(isset($product->image))
                                <img src="{{ Storage::url($product->image) }}" alt="" class="img-fluid card-img">
                                @else
                                <img style="height:240px" src="{{ asset('images/no_image.png') }}" alt="" class="img-fluid card-img">
                                @endif

                            <div class="card-body">
                                <h3 class="product-card-title">{{ $product->title }}</h3>
                                <p>
                                   {!! $product->description !!}
                                </p>
                            </div>
                             <div>
                                <a href="{{ route('product.detail',$product->slug) }}" class="btn product-card-btn">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </section>
    <!-- ======= Product Section End ======= -->

</main>
<!-- ======= Main End ======= -->

@endsection
