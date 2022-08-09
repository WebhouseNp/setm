@extends('frontend::layouts.master')
@section('title',$blog->title)
@section('content')

<!-- ======= Main Start ======= -->
<main id="main">

    <!-- ======= Banner Start ======= -->
    <section class="banner-service">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">{{ Str::title($blog->title) }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner End ======= -->

   
    <!-- ======= Blog Details Section Start ======= -->
    <section class="blog-details py-lg-5 py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 aos-init" data-aos="fade-right" data-aos-delay="700">

                    <img src="{{ Storage::url($blog->image) }}" alt="" class="img-fluid card-img">
                    <p class="blog-date-inner mb-0 mt-3">Posted On: <span>{{$blog->created_at->format('M d, Y') }}</span></p>
                    <h4 class="mt-2">{{ Str::title($blog->title) }}</h4>
                    <p>{!! $blog->description !!}</p>
                    <p>{!! $blog->blog_full_description !!}</p>
                </div>

                <div class="col-lg-4 col-sm-12 aos-init" data-aos="fade-left" data-aos-delay="700">
                    <h4 class="font-weight-bolder mb-0">Read Also</h4>
                    <hr>
                    @foreach($recentBlogs as $recentBlog)
                        <div class="card border-0 related-card mb-lg-5 mb-3">
                            <div class="row">
                                <div class="col-4">
                                    @if(isset($recentBlog->image))
                                    <img src="{{ Storage::url($recentBlog->image) }}" alt="" class="card-img img-fluid">
                                    @else
                                    <img src="{{ asset('images/no_image.png') }}" alt="" class="card-img img-fluid">
                                    @endif
                                </div>
                                <div class="col-8">
                                    <h6 class="mb-1">{{ Str::title($recentBlog->title) }} </h6>
                                    <p>
                                        {{ Str::limit(html_entity_decode(strip_tags($recentBlog->description)),'110','...') }}
                                    </p>
                                    <a href="{{ route('blog.detail',$recentBlog->slug) }}" class="btn card-link">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Blog Details Section End ======= -->


</main>
<!-- ======= Main End ======= -->

@endsection
