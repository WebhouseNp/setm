<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>LOKSEC | @yield('title','Cyber Security Expert')</title>
    <meta content="{{ $site->description }}" name="description">
    <meta content="{{ $site->meta_keyword }}" name="keywords">
    {{-- {{ asset('frontend/ ') }} --}}
    <!-- Favicons -->
    @if(isset($site->fav_icon))
    <link href="{{ Storage::url($site->fav_icon) }}" rel="icon">
    @else
    <link href="{{ asset('images/favicon.png') }}" rel="icon">
    @endif
    <link href="{{ asset('frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl-carousel.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

    {{-- Toster Message --}}
    <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">-->
</head>
<script>

    function preloader() {
	$('#ctn-preloader').addClass('loaded');
	$("#loading").fadeOut(500);

	if ($('#ctn-preloader').hasClass('loaded')) {

		$('#preloader').delay(900).queue(function () {
			$(this).remove();
		});
	}
}
$(window).on('load', function () {
	preloader();
});

</script>

<body>
<!-- preloader  -->
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="L" class="letters-loading">
                    L
                </span>
                <span data-text-preloader="O" class="letters-loading">
                    O
                </span>
                <span data-text-preloader="K" class="letters-loading">
                    K
                </span>
                <span data-text-preloader="S" class="letters-loading">
                    S
                </span>
                <span data-text-preloader="E" class="letters-loading">
                    E
                </span>
                <span data-text-preloader="C" class="letters-loading">
                    C
                </span>
            </div>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- preloader end -->
<!-- ======= Header Start ======= -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-8 col-12 mx-auto">
                        <div>
                            <p>
                                Call to schedule an inspection: &nbsp; &nbsp;
                                <span style="font-size: 16px">
                                    <a href="tel:1234567890" class="text-white">
                                        <i class="fa fa-phone"></i>
                                        @if (isset($site))
                                        {{ $site->contact1 }}
                                    @endif
                                    </a>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mx-auto">
                        <div>
                            <ul>
                                <li><a target="_blank" href="{{ $site->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a target="_blank"  href="{{ $site->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank"  href="{{ $site->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                                <li><a target="_blank"  href="{{ $site->instagram }}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header id="header" class="d-flex align-items-center header-transparent sticky-top shadow-sm">
    <div class="container-fluid">

        <div class="row justify-content-center align-items-center">
            <div class="col-xl-11 d-flex align-items-center justify-content-between">
                <h1 class="logo">
                    <a href="{{ url('/') }}">
                        @if(isset($site->header_logo))
                        <img src="{{ Storage::url($site->header_logo) }}" alt="LOKSEC" width="120px" style="max-height:75px;">
                        @else
                        <img src="{{ asset('images/logo.png') }}" alt="LOKSEC" width="120px" style="max-height:75px;">
                        @endif
                    </a>
                </h1>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto" href="{{ url('/') }}">Home</a></li>
                        <li><a class="nav-link scrollto" href="{{ route('about') }}">About Us</a></li>
                        <!-- <li><a class="nav-link scrollto" href="product-listing.php">Products</a></li> -->
                        @if(isset($products[0]))
                        <li><a class="nav-link scrollto" href="{{ route('product') }}">Products </a></li>
                        @endif
                        @if(isset($dashboard_services[0]))
                        <li><a class="nav-link scrollto" href="{{ route('service') }}">Services</a></li>
                        @endif
                        @if(isset($dashboard_partners[0]))
                        <li><a class="nav-link scrollto" href="{{ route('partner') }}">Our Partners</a></li>
                        @endif
                        @if(isset($dashboard_blogs[0]))
                        <li><a class="nav-link scrollto" href="{{ route('blog') }}">Blogs</a></li>
                        @endif
                        <li><a class="nav-link scrollto" href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </div>

    </div>
</header>
<!-- ======= Header End ======= -->





