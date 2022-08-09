@extends('frontend::layouts.master')
@section('content')

<!-- ======= Hero Section Start ======= -->
<section id="home" class="hero">
    <div class="hero-container">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <ol id="hero-carousel-indicators" class="carousel-indicators">
                
            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach($sliders as $key=>$slider)
                    <div class="carousel-item carousel-item-next {{ $key==0?'carousel-item-start active':'' }}" style="background-image: url({{ Storage::url($slider->image) }})">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">{{ $slider->slider_title }}</h2>
                                <p class="animate__animated animate__fadeInUp">{!! $slider->slider_description !!}</p>
                                <a href="{{ route('contact') }}" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </div>
</section>
<!-- ======= Hero Section End ======= -->
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

<!-- ======= Main Start ======= -->
<main id="main">
    <section id="havebeenpawned" class="about">
        <div class="container aos-init" data-aos="fade-up">
            <header class="section-header">
                <h3>Have you been compromised</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>

                <p>Check if your email or phone is in a data breach</p>
            </header>
            <div class="row about-cols" style="text-align: center;">
                <div class="aos-init" data-aos="fade-up" data-aos-delay="100">
                    <form id="haveibeenpwned">
                        <div class="mb-3 justify-content-center input-group">
                            <input type="text" placeholder="Enter Your Email or Phone Number (International Format)" id="compromisedemail" name="compromised_email" style="height:60px;width:700px; font-size: 20px; padding-left: 10px;" class="">
                            <div class="input-group-append">
                                <input type="submit" value="Check Now" class="cmp-btn">
                            </div>
                        </div>
                        <!-- <input type="text" placeholder="email or phone (+1 408 XXX XXXX)" id="compromisedemail" name="compromised_email" style="height:60px;width:700px; font-size: 20px; padding-left: 10px;" class="">

                        <input type="submit" value="compromised?" class="cmp-btn"> -->
                    </form>

                </div>
            </div>
        </div>
    </section>

    <div class="test1">

    </div>



    <!-- counter start -->
    <section class="py-3 counter-wp py-lg-5">
        <div class="container">
            <header class="mt-3 section-header">
                <h3 class="text-white">Cyber Threat Statistics </h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                                <p></p>

            </header>
            <div class="counter-up-wp">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="mb-4 text-center single-counter">
                            <div class="counter-text">
                                <h1><span class="counter">
                                    @if (isset($site))
                                        {{ $site->title1 }}
                                    @endif
                                </span><span>+</span> </h1>
                            </div>
                            <div class="counter-desc">
                                <h5>Company Breaches</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="mb-4 text-center single-counter">
                            <div class="counter-text">
                                <h1><span class="counter">
                                    @if (isset($site))
                                        {{ $site->title2 }}
                                    @endif
                                </span><span>+</span> </h1>
                            </div>
                            <div class="counter-desc">
                                <h5>Botnet Activities</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="mb-4 text-center single-counter">
                            <div class="counter-text">
                                <h1><span class="counter">
                                    @if (isset($site))
                                        {{ $site->title3 }}
                                    @endif
                                </span><span>+</span> </h1>
                            </div>
                            <div class="counter-desc">
                                <h5>Ransomeware Attacks</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="mb-4 text-center single-counter">
                            <div class="counter-text">
                                <h1><span>$ </span><span class="counter">
                                    @if (isset($site))
                                        {{ $site->title4 }}
                                    @endif
                                </span><span>+</span> </h1>
                            </div>
                            <div class="counter-desc">
                                <h5>US Dollar impact</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </section>
    <!-- counter end -->

    <!-- Working Process start -->
    @if (isset($workingProcesses[0]))
    <section class="py-3 working-steps py-lg-5">
        <div class="container">
            <header class="section-header wow fadeInUp">
                <h3>LOKSEC Solution Process</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                <p>
                    LOKSEC process includes a comprehensive consultation to identify security gaps and loopholes.               
                    </p>
            </header>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div id="primary" class="content-area">
                        <div id="main" class="site-main">
                            <article>
                                <div class="entry-content">
                                    <div class="timeline-wrapper">
                                        @foreach ($workingProcesses as $key => $workingprocess)
                                            <div class="timeline-item">
                                                <div class="timeline-img">
                                                    {{++$key}}
                                                </div>

                                                <div class="timeline-content aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                                                    <div class="timeline-icon">
                                                        @if(isset($workingprocess->image))
                                                        <img src="{{ Storage::url($workingprocess->image) }}" alt="Information Gathering – Drc Infotech">
                                                        @endif
                                                    </div>
                                                    <div class="timeline-text">
                                                        <h2>{{$workingprocess->title}}</h2>
                                                        <p>
                                                            {{ html_entity_decode(strip_tags($workingprocess->description)) }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endif

    <!-- Working Process end -->

    <!-- ======= Product Section ======= -->
    @if (isset($products[0]))
    <section id="products" class="products">
        <div class="container">
            <header class="section-header wow fadeInUp">
                <h3>Products</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                <p>
                    LOKSEC products are designed to protect your infrastructure enabling you to focus on your business.
                </p>
            </header>

            <div class="row">
                @foreach($products as $product)
                    <div class="mx-auto mb-4 col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up" data-aos-delay="100">
                        <div class="border-0 card product-card">
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

            <div style="margin-bottom:30px;" class="mb-3 row">
                <div class="mt-3 text-center view-more">
                    <a href="{{ route('product') }}" class="btn btn-more-pd">
                        View More Product &raquo;
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- ======= Product Section End ======= -->

    <!-- Submit an incident -->
        <section class="team-up">
        <div class="team-up-detail partner-detail">
             <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 aos-init" data-aos="fade-right" data-aos-delay="700">
                        <div class="partner-title">
                            <p>Report a Security Incident</p>
                            <h2>It is important that actual or suspected security incidents are reported as early as possible to limit the damage and cost of recovery.</h2>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 aos-init" data-aos="fade-left" data-aos-delay="700">
                        <div class="partner-icon text-center">
                            <i class="fa fa-bug" aria-hidden="true"></i>
                      </div>
                        <div class="btn-box partner-btn-box text-center partner-btn-box">
                            <button class="l-btn"> <a href="{{ route('submitIncident') }}"> Submit an Incident</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-up-box"></div>
    </section>

        <!-- Submit an incident end-->





    <!-- ======= Services Section ======= -->
    @if (isset($services[0]))
    <section id="services" class="services">
        <div class="container">
            <header class="section-header wow fadeInUp">
                <h3>services</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                <p>
                    LOKSEC service are designed for you, considering your needs and resources, and provide you peace of mind.
                    </p>
            </header>

            <div class="row">
                @foreach($services as $service)

                <div class="col-lg-4 col-md-6 box aos-init" data-aos="fade-up" data-aos-delay="100">
                    <div class="program-box">
                        <div class="program-icon-box">
                               <img src="{{ Storage::url($service->icon) }}" alt="" class="img-fluid card-img">
                        </div>
                        <div class="program-detail">
                            <h4><a href="{{ route('service.detail',$service->slug) }}">{{ $service->title }}</a></h4>
                            <p>{{ Str::limit(html_entity_decode(strip_tags($service->description)), '200','....') }}</p>
                        </div>
                        <div class="program-detail">
                           <a href="{{ route('service.detail',$service->slug) }}" class="btn-details">Learn More</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>
    @endif
    <!-- End Services Section -->

    <!-- ======= Partner Start ======= -->
    @if (isset($partners[0]))
    <section class="partner-slide">
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
                                <h5 class="card-title">{{ $partner->title }}</h5>
                                <p class="card-description">
                                    {{ html_entity_decode(strip_tags($partner->description))}}
                                </p>
                            <h5><i class="bi bi-geo-alt-fill"></i> {{ Str::title($partner->city) }}, {{ Str::title($partner->country) }} </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <!-- ======= Partner End ======= -->

    <!-- ======= Clients Start ======= -->
    @if (isset($clients[0]))
    <section class="py-5 client">
        <div class="container">
            <header class="pb-5 section-header wow fadeInUp">
                <h3>Trusted by these fine companies</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
            </header>
            <div class="client-carousel aos-init" data-aos="fade-up" data-aos-delay="700">
                <div class="owl-carousel owl-theme">
                    @foreach ($clients as $client)
                        <div class="item">
                            <img src="{{ Storage::url($client->icon) }}" alt="client" class="img-fluid w-100">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- ======= Clients End ======= -->


    <!-- ======= Testimonial Section Start ======= -->
    @if (isset($testimonials[0]))
    <section class="testimonial">
        <div class="container">
            <header class="section-header wow fadeInUp">
                <h3>Testimonials</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                <p>Our products includes a comprehensive consult to help identify security gaps and loopholes, a comprehensive report that includes a project plan with timelines and milestones.</p>
            </header>
            <div class="row">
                <div class="mx-auto col-lg-8 col-md-10 col-sm-12">
                    <div class="testimonial-carousel">
                        <div class="owl-carousel owl-theme aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                            @foreach($testimonials as $testimonial)
                                <div class="item">
                                    <div class="bg-transparent border-0 card testimonial-card">
                                        @if(isset($testimonial->image))
                                        <img src="{{ Storage::url($testimonial->image) }}" alt="" class="card-img img-fluid">
                                        @else
                                        <img style="height:240px" src="{{ asset('images/no_image.png') }}" alt="" class="card-img img-fluid">
                                        @endif
                                                    <div class="text-center card-body">
                                            <p class="text-white card-description">
                                                {{ html_entity_decode(strip_tags($testimonial->description)) }}
                                            </p>
                                            <h5 class="text-white card-title">{{ $testimonial->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- ======= Testimonial Section End ======= -->

    <!-- ======= Associations Start ======= -->
    @if (isset($departments[0]))
    <section class="py-5 client">
        <div class="container">
            <header class="pb-5 section-header wow fadeInUp">
                <h3>We Are Associated With</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
            </header>
            <div class="client-carousel aos-init" data-aos="fade-up" data-aos-delay="700">
                <div class="owl-carousel owl-theme">
                    @foreach ($departments as $department)
                        <div class="item">
                            <a target="_blank" href="{{ $department->link }}">
                                <img src="{{ Storage::url($department->image) }}" alt="client" class="img-fluid w-100">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- ======= Associations End ======= -->
    <!-- ======= Team Start ======= -->
    @if (isset($teams[0]))
    <section class="py-5 team">
        <div class="container">
            <header class="pb-5 section-header wow fadeInUp">
                <h3>Meet Our Team</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
            </header>
            <div class="row aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                @foreach($teams as $team)
                <div class="col-lg-3 col-sm-6 col-xs-12">
                    <div class="team-member">
                        <div class="team-img">
                            <a href="#">
                                @if(isset($team->image))
                                <img src="{{ Storage::url($team->image) }}" alt="team" class="img-fluid">
                                @else
                                <img src="{{ asset('images/no_image.png') }}" alt="team" class="img-fluid">
                                @endif
                            </a>
                        </div>
                        <div class="team-content">
                            <div class="team-content-title">
                                <h4>{{ Str::title($team->name) }}</h4>
                                <h6>{{ Str::title($team->position) }}</h6>
                            </div>
                            <div class="team-content-share">
                                <p>{{ Str::limit(html_entity_decode(strip_tags($team->content)), '120') }}</p>
                                <ul class="p-0 team-content-social-icon">
                                    <li><a class="facebook" href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="instagram" href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="mt-3 text-center mt-lg-5">
                <a href="{{ route('team') }}" class="btn btn-team"> See All <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    @endif
    <!-- ======= Team End ======= -->

    <!-- ======= Subscribe Start ======= -->
    <section class="subscribe-box">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-7 aos-init" data-aos="fade-right" data-aos-delay="500">
                    <div class="subscribe-caption">
                        <h2>Join our Newsletter</h2>
                        <p>Sign up to stay updated with the latest insights news and more.</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-5 aos-init" data-aos="fade-left" data-aos-delay="500">
                    <div class="subscribe-form">
                        {{-- @include('errors.validation-error') --}}
                        {{-- @if(Session::has('success'))
                        @include('success.success',['success'=>Session::get('success')])
                        @endif
                        @if(Session::has('error'))
                        @include('errors.catch-error',['catch_error'=>Session::get('error')])
                        @endif --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('subscribePost') }}" class="form row" method="POST">
                                @csrf
                            <input type="email" class="col-8" name="email" id="subscribe" placeholder="Enter Your Email" required>
                            <button class="col-4 l-btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Subscribe End ======= -->

    <!-- ======= Blog Section Start ======= -->
    @if(isset($blogs[0]))
    <section class="blog">
        <div class="container">
            <header class="section-header wow fadeInUp">
                <h3>Our Blog</h3>
                <span class="btm-line aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000"></span>
                <p>Click Out Oer Latest News & Article</p>
            </header>
            <div class="pb-3 row pb-lg-5 aos-init" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                @foreach($blogs as $blog)

                <div class="mx-auto col-lg-4 col-md-6 col-sm-12">
                    <div class="border-0 blog-card">
                        <div class="image">
                            <a href="{{ route('blog.detail',$blog->slug) }}">
                                @if(isset($blog->image))
                                <img src="{{ Storage::url($blog->image) }}" alt="" class="img-fluid">
                                @else
                                <img style="height:265px" src="{{ asset('images/no_image.png') }}" alt="" class="img-fluid">
                                @endif
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="blog-date">
                                <span>{{ $blog->created_at->format('d') }}</span> {{ $blog->created_at->format('M') }}
                            </div>
                            <h4>
                                <a href="{{ route('blog.detail',$blog->slug) }}">
                                    {{ $blog->title }}y
                                </a>
                            </h4>
                            <p class="text">
                                {{ Str::limit(html_entity_decode(strip_tags($blog->description)),'110','...') }}
                            </p>
                            <a class="read-more" href="{{ route('blog.detail',$blog->slug) }}">
                                Read More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-2 text-center">
                <a href="{{ route('blog') }}" class="btn btn-team"> View More <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    @endif
    <!-- ======= Blog Section End ======= -->



</main>
<!-- ======= Main End ======= -->

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#errorMessage").delay(2000).slideUp(500);
            $("#successMessage").delay(4000).slideUp(500);
        });

    </script>
@endpush
