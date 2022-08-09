@extends('frontend::layouts.master')
@section('title',Str::title($event->title))
@section('content')
<div class="inner-heading">
    <div class="container">
        <h1>{{ $event->title }}</h1>
    </div>
</div>
<!-- Inner Heading end -->

<!--Classes Start-->
<div class="inner-content">
    <div class="container">
        <div class="blog-wrapr">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-post">
                        <div class="post-image">
                            <img src="{{ Storage::url($event->image) }}" alt="post image" class="img-responsive">
                        </div>
                        <div class="post-content">
                            <h3>{{ Str::title($event->title) }}</h3>
                            <ul class="post-meta">
                            </ul>
                            <p>{!! $event->description !!}</p>
                        </div>
                        <div class="content-bottom">
                            {{-- <ul class="post-share">
                                <li><span class="flaticon-share"></span> Share :</li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            </ul> --}}
                        </div><!-- content-bottom -->
                    </div>


                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-item">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="categories">
                                <li><a href="{{ route('newStudent') }}">New Students ({{ $newStudentCount }})</a></li>
                                <li><a href="{{ route('enrichmentProgram') }}">Enrichment Programs ({{ $enrichmentCount
                                        }})</a></li>
                                <li><a href="{{ route('foreignVisit') }}">Foreign Visits ({{ $foreignVisitCount }})</a>
                                </li>
                                <li><a href="{{ route('schoolRulesAndRegulations') }}">School Rules and Regulations
                                        ({{ $rulesCount }})</a></li>
                            </ul>
                        </div>
                        <!-- sidebar item -->
                        <div class="sidebar-item">
                            <h3 class="sidebar-title">Other News & Events</h3>

                            <ul class="sidebar-posts">
                                @foreach($others as $other)
                                <li>
                                    <div class="image">
                                        <a href="{{ route('eventDetail',$other->id) }}"><img
                                                src="{{ Storage::url($other->image) }}" alt="post image"
                                                class="img-responsive"></a>
                                    </div>
                                    <div class="content">
                                        <a href="{{ route('eventDetail',$other->id) }}">{{ $other->title }}</a>
                                        <span>{{ $event->created_at->format('d F Y') }}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul><!-- sidebar-posts -->
                        </div><!-- sidebar item -->


                    </div>
                </div>


            </div>
        </div>



    </div>
</div>
@endsection
