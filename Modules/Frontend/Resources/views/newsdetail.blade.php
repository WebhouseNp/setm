@extends('frontend::layouts.master')
@section('title',$news->title)
@section('content')
<!-- banner section start here -->
<div class="page-header bg_img" style="background-image: url(/frontend/images/banner/page-header/01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                <div class="page-header-area">
                    <h3 class="page-header-title">{{ Str::title($news->title) }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="mb-0 bg-transparent breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section ending here -->

<!-- Blog section start here -->
<div class="blog-section blog-page blog-single padding-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <article>
                    <div class="section-wrapper">
                        <div class="post-item-2">
                            <div class="post-item-inner">
                                <div class="post-thumb">
                                    <img src="{{ Storage::url($news->image) }}" alt="blog">
                                </div>
                                <div class="tags-section text-right">
                                    <div class="scocial-media mb-0 mt-5">
                                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                        <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                                    </div>
                                </div>
                                <div class="post-content pt-2">
                                    <h3>{{ Str::title($news->title) }}</h3>
                                    <div class="author-date">
                                        <a href="#" class="date"><i class="icofont-calendar"></i>{{
                                            $news->created_at->format('M d,Y') }}</a>
                                        <a href="#" class="admin"><i class="icofont-ui-user"></i>{{
                                            Str::title($news->author) }}</a>
                                    </div>

                                    {!! $news->description !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-lg-4 col-12">
                <aside>
                    <div class="widget widget-post">
                        <div class="widget-header">
                            <h5>Recent Posts</h5>
                        </div>
                        <ul class="widget-wrapper lab-ul">
                            @foreach($recent as $n)
                            <li class="flex-wrap d-flex justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('news.detail',$n->slug) }}"><img
                                            src="{{ Storage::url($n->image) }}"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('news.detail',$n->slug) }}">
                                        <h6>{{ Str::title($n->title) }}</h6>
                                    </a>
                                    <p>{{ $n->created_at->format('d M, Y') }}</p>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Blog section ending here -->
@endsection
