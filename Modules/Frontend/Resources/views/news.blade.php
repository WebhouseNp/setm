@extends('frontend::layouts.master')
@section('title','News')
@section('content')
<!-- banner section start here -->
<div class="page-header bg_img" style="background-image: url(frontend/images/banner/page-header/01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                <div class="page-header-area">
                    <h3 class="page-header-title">Newses</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="mb-0 bg-transparent breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Newses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section ending here -->

<!-- Blog section start here -->
<section class="blog-section blog-page padding-tb">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                @foreach($newses as $news)
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="post-item-2">
                        <div class="post-item-inner">
                            <div class="post-thumb">
                                <a href="{{ route('news.detail',$news->slug) }}"><img
                                        src="{{ Storage::url($news->image) }}" alt="lab-blog"></a>
                            </div>
                            <div class="post-content">
                                <h4><a href="{{ route('news.detail',$news->slug) }}">{{ $news->title }}</a></h4>
                                <div class="author-date">
                                    <a href="#" class="date"><i class="icofont-calendar"></i>{{
                                        $news->created_at->format('M d,Y') }}</a>
                                    <a href="#" class="admin"><i class="icofont-ui-user"></i>{{
                                        Str::title($news->author) }}</a>
                                </div>
                                <p>{{ Str::limit(html_entity_decode(strip_tags($news->description)),100,'...') }}</p>
                                <div class="post-footer">
                                    <a href="{{ route('news.detail',$news->slug) }}" class="text-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{ $newses->links('frontend::includes.pagination') }}
        </div>
    </div>
</section>
@endsection
