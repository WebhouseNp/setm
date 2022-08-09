@extends('frontend::layouts.master')
@section('title','Contact Us')
@section('content')
<!-- ======= Main Start ======= -->
<main id="main">

    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($dashboard_site->contact_banner))
            {{ Storage::url($dashboard_site->contact_banner) }}
        @else
            {{ asset('images/banner.jpg') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">Let's work together</h2>
                    <p>
                        Get Started
                    </p>
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
    <!-- ======= Contact Start ======= -->
    <section class="contact py-lg-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 aos-init" data-aos="fade">
                    <p>
                        Please tell us a bit about you, your project, and how best to reach you. We’ll get right back to you.
                    </p>

                    <iframe src="{{ html_entity_decode(strip_tags($site->map)) }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                </div>

                <div class="col-md-7 col-sm-12 aos-init" data-aos="fade">

                    <form class="contact-form" method="POST" action="{{ route('contactPost') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Your Full Name</label>
                            <input type="text" placeholder="eg. John Smith" name="name" id="fullName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="email">Email Address</label>
                            <input type="email" placeholder="eg. you@example.com" name="email" id="emailAddress" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subject" class="font-weight-bold">Subject</label>
                            <input type="text" placeholder="eg. App Testing" name="subject" id="subject" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="message">Tell us something about your project</label>
                            <textarea placeholder="eg. I am looking to test my incredible app that...." name="message" id="message" class="form-control" rows="8"></textarea>
                        </div>

                        <button class="btn btn-submit">Send Message <i class="fa fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Contact End ======= -->

    <div class="container">
        <div class="line m-0x"></div>
    </div>

    <!-- ======= Location Start ======= -->
     @if (isset($dashboard_addresses[0]))
    <section class="location py-lg-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <h2 class="location-heading">
                        We're happy to chat in person if you're close to one of our office locations.
                    </h2>
                </div>
            </div>
            <div class="row aos-init" data-aos="fade-up" data-aos-delay="700">
                @foreach ($dashboard_addresses as $address)
                    <div class="col-md-6 col-lg-3 mb-4 mx-auto">
                        <div class="card location-card border-0">
                            @if(isset($address->image))
                            <img src="{{ Storage::url($address->image) }}" alt="" class="card-img img-fluid">
                            @else
                            <img src="{{ asset('frontend/img/location/1.jpg') }}" alt="" class="card-img img-fluid">
                            {{-- <img style="height:240px" src="{{ asset('images/no_image.png') }}" alt="" class="img-fluid card-img"> --}}
                            @endif
                            <h4 class="location-card-title">{{ $address->country }}</h4>
                            <p class="location-card-address"><i class="bi bi-geo-alt"></i> {{ $address->address }}, {{ $address->city }}</p>
                            <p class="location-card-address"><i class="bi bi-envelope"></i> {{ $address->email1 }}</p>
                            {{--<p class="location-card-address"><i class="bi bi-envelope"></i> {{ $address->email2 }}</p>--}}
                            <p class="location-card-address"><i class="bi bi-telephone"></i> {{ $address->phone }}</p>
                            {{--<p class="location-card-address"><i class="bi bi-telephone"></i> {{ $address->phone2 }}</p>--}}
                            {{--<p class="location-card-address">{{ $address->map }}</p>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- ======= Location End ======= -->


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
