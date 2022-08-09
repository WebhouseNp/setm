@extends('frontend::layouts.master')
@section('title','Teams')
@section('content')

<!-- ======= Main Start ======= -->
<main id="main">

    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($dashboard_site->team_banner))
            {{ Storage::url($dashboard_site->team_banner) }}
        @else
            {{ asset('images/banner.jpg') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9">
                    <h2 class="banner-service-title">Our Teams</h2>
                    <p>
                        Meet Our Experienced Team for your Business!!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner End ======= -->


    <!-- ======= Team Start ======= -->
    <section class="team py-lg-5 py-3">
        <div class="container">

            <div class="row aos-init" data-aos="fade-up" data-aos-delay="700">
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
                                    <ul class="team-content-social-icon p-0">
                                        <li><a class="facebook" href="{{ $team->facebook }}"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="twitter" href="{{ $team->twitter }}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="instagram" href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a></li>
                                        <li><a class="instagram" href="{{ $team->instagram }}"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $teams->links('pagination::bootstrap-4') }}
        </div>
    </section>
    <!-- ======= Team End ======= -->


</main>
<!-- ======= Main End ======= -->

@endsection
