<!-- ======= Footer Start ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-info">
                    <a href="{{ url('/') }}">
                        @if(isset($site->footer_logo))
                        <img src="{{ Storage::url($site->footer_logo) }}" alt="LOKSEC" width="50%" style="max-height:50%;">
                        @else
                        <img src="{{ asset('images/logo.png') }}" alt="LOKSEC" width="50%" style="max-height:50%;">
                        @endif
                    </a>
                    {{-- <p>{{ $site->description }}</p> --}}
                    <p>{{ html_entity_decode(strip_tags($site->description)) }}</p>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                         <li><i class="bi bi-chevron-right"></i><a  href="{{ route('about') }}">About Us</a></li>
                        <li><i class="bi bi-chevron-right"></i><a href="{{ route('service') }}">Services</a></li>
                        <li><i class="bi bi-chevron-right"></i><a href="{{ route('product') }}">Products</a></li>
                       {{-- <li><i class="bi bi-chevron-right"></i><a href="{{route('getPages', 'terms-of-service')}}">Terms of service</a></li>
                        <li><i class="bi bi-chevron-right"></i><a href="{{route('getPages', 'privacy-policy')}}">Privacy policy</a></li>--}}
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p>
                       {!! $site->address !!}
                       <br>
                        <strong>Phone:</strong> {!! $site->contact1 !!}<br>
                        <strong>Email:</strong> {!! $site->email1 !!}<br>
                    </p>

                    <div class="social-links">
                        <a target="_blank" href="{{ $site->facebook }}"><i class="bi bi-facebook"></i></a>
                        <a target="_blank" href="{{ $site->twitter }}"><i class="bi bi-twitter"></i></a>
                        <a target="_blank" href="{{ $site->linkedin }}"><i class="bi bi-linkedin"></i></a>
                        <a target="_blank" href="{{ $site->instagram }}"><i class="bi bi-instagram"></i></a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            © Copyright <strong>LOKSEC LLC.</strong>. All Rights Reserved
        </div>
    </div>
</footer>
<!-- ======= Footer End ======= -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- Vendor JS Files -->
    {{-- {{ asset('frontend/ ') }} --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('frontend/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('frontend/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('frontend/js/owl-carousel.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="{{ asset('frontend/js/owl-carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/particles.js') }}"></script>
<script src="{{ asset('frontend/js/app.js') }}"></script>

<!-- Toaster -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    jQuery(document).ready(function(){
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script>

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

    $(document).ready(function(){
        $(".partner-slide .owl-carousel").owlCarousel({
            nav: false,
            margin:20,
            dots: false,
            responsiveClass: true,
            autoplay: true,
            autoplaySpeed: 3000,
            navSpeed: 2000,
            loop: false,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:2,
                },
                1000:{
                    items:4,
                }
            }
        });
    });

    $(document).ready(function(){
        $(".client-carousel .owl-carousel").owlCarousel({
            nav: false,
            margin:20,
            dots: false,
            responsiveClass: true,
            autoplay: true,
            autoplaySpeed: 3000,
            navSpeed: 2000,
            loop: false,
            responsive:{
                0:{
                    items:2,
                },
                600:{
                    items:3,
                },
                1000:{
                    items:5,
                }
            }
        });
    });
</script>

<script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
    $("#haveibeenpwned").on("submit", function(e){
        e.preventDefault();
        let email = $("#compromisedemail").val();

        $.ajax({
            url: '/search',
            data: {data: email},
            type: 'post',
            success: function(res) {
                let rawHTML = []
                if(res.data.length > 0 )
                {
                    let html = `<div class="danger-result" style="background: #320f0f;">
                        <div class="container">
                            <div class="row">
                                <div class="text-center col-12">
                                    <div class="pwnTitle">
                                        <h2>Uff ! Data Breached.</h2>
                                        <p>Pwned in ${res.data.length} data breaches </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                        rawHTML.push(html);

                    for(const data of res.data){

                        let html = `<div class="danger-alert" style="background: #320f0f;">
                            <div class="container py-3">
                                <div class="row">
                                        <div class="mb-2 text-center col-lg-2 col-md-3 col-sm-12">
                                            <img src="${data.LogoPath}" alt="" clas="img-fluid" style="width: 115px !important; max-height: 100px !important;">
                                        </div>
                                        <div class="mx-auto col-lg-10 col-md-9 col-sm-12" style="color: #fff;">
                                            ${data.Name}: ${data.Description}<br>
                                            Compromised data: ${data.DataClasses}
                                        </div>
                                    </div>
                            </div>
                        </div>`;
                        rawHTML.push(html);
                    }

                }else{
                    let html = `<div class="no-pwned">
                        <div class="container">
                            <div class="row">
                                <div class="text-center col-12">
                                    <div class="pwnTitle">
                                        <h2>Congratulations !</h2>
                                        <p>No breached data.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                        rawHTML.push(html);
                }

                $('.test1').html(rawHTML)
                console.log(res);
            },
            error: function(err){
                console.log(err);
            }

        });

    });

</script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
    }
    @endif
</script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/620642feb9e4e21181be9a8b/1frk7bcpt';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>