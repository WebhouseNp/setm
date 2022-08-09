@extends('frontend::layouts.master')
@section('title','Blogs')
@section('content')

<!-- ======= Main Start ======= -->
<main id="main">

    <!-- ======= Banner Start ======= -->
    <section class="banner-service" style="background-image:url(
        @if (isset($dashboard_site->blog_banner))
            {{ Storage::url($dashboard_site->blog_banner) }}
        @else
            {{ asset('images/banner.jpg') }}
        @endif
        )">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                    <h2 class="banner-service-title">Our Blogs</h2>
                    <p>
                        Read our news, articles and blogs to get update on each and every cyber information.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ======= Banner End ======= -->


    <!-- ======= Blog Section Start ======= -->
    <section class="blog py-3 py-lg-5">
        <div class="container">

            <div class="row pb-lg-5 pb-3 aos-init" data-aos="fade-up" data-aos-delay="700">

                {{-- <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                    <div class="blog-card border-0">
                        <div class="image">
                            <a href="blog-details.php">
                                <img src="assets/img/blog/blog-1.jpg" alt="blog" class="img-fluid">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="blog-date">
                                <span>22</span> DEC
                            </div>
                            <h4>
                                <a href="blog-details.php">
                                    Define World Best IT Solution Technology
                                </a>
                            </h4>
                            <p class="text">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has ...
                            </p>
                            <a class="read-more" href="blog-details.php">
                                Read More <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div> --}}
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
                        <div class="blog-card border-0">
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
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </section>
    <!-- ======= Blog Section End ======= -->


</main>
<!-- ======= Main End ======= -->

@endsection
