@extends('frontend::layouts.master')
@section('title',$product->title)
@section('content')
<main id="main">

    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($product->product_detail_banner))
            {{ Storage::url($product->product_detail_banner) }}
        @else
            {{ asset('images/banner.jpg') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">{{ $product->title }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner End ======= -->

    <!-- alerts -->
    @if (session('message'))

        <div class="alert alert-primary alert-dismissible text-capitalize text-center" id="successMessage" style="z-index: 999;">
            <a href="#" data-dismiss="alert" aria-label="close"></a>
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible text-capitalize text-center" id="errorMessage">
            <a href="#" data-dismiss="alert" aria-label="close"></a>
                <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- ======= Product Details Section ======= -->
    <section class="py-3 product-details py-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h4 class="mt-3">{{ $product->title }}</h4>

                   <p>
                        {!! $product->description !!}
                    </p>
                    <img src="{{ Storage::url($product->image) }}" alt="" class="img-fluid card-img">

                    <p>
                        {!! $product->product_full_description !!}
                    </p>
                     <!-- inquiry form start -->
                    <div class="mt-4 inquiry-card">
                        <h5 class="inquiry-title">Inquire This Product</h5>

                        <form class="inquiry-form" method="POST" action="{{ route('productInquire') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
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
                    <h4 class="mb-0 font-weight-bolder">Other Products</h4>
                    <hr>
                    @foreach($recentProducts as $recentProduct)
                        <div style="margin-top:5px;" class="mb-3 border-0 card related-card mb-lg-5">
                            <div class="row">
                                <div class="col-4">
                                    {{-- <img src="{{ Storage::url($recentProduct->image) }}" alt="" class="card-img img-fluid"> --}}
                                    @if(isset($recentProduct->image))
                                    <img src="{{ Storage::url($recentProduct->image) }}" alt="" class="card-img img-fluid">
                                    @else
                                    <img src="{{ asset('images/no_image.png') }}" alt="" class="card-img img-fluid">
                                    @endif
                                </div>
                                <div class="col-8">
                                    <h6 class="mb-1">{{ $recentProduct->title }}</h6>
                                    <p>
                                    {!! Str::limit($product->description,150) !!}
                                    </p>
                                    <a href="{{ route('product.detail',$recentProduct->slug) }}" class="btn card-link">Learn More</a>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#errorMessage").delay(2000).slideUp(500);
            $("#successMessage").delay(4000).slideUp(500);
        });

    </script>
@endpush
@endsection
