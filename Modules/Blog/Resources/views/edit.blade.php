@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blog</a></li>
    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-lg-12">
            @include('errors.validation-error')
            @if(Session::has('error'))
            @include('errors.catch-error',['catch_error'=>Session::get('error')])
            @endif
            <form method="post" action="{{ route('blog.update',$blog->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Edit Blog</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input name="title" class="form-control" value="{{ $blog->title }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input name="author" class="form-control" value="{{ $blog->author }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="description">Blog Short Description</label>
                                    <textarea name="description" class="form-control"
                                        required>{{ $blog->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="blog_full_description">Blog Full Description</label>
                                    <textarea name="blog_full_description" class="form-control"
                                        required>{{ $blog->blog_full_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input name="meta_title" class="form-control" value="{{ $blog->meta_title }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input name="meta_keyword" class="form-control" value="{{ $blog->meta_keyword }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <input name="meta_description" class="form-control" value="{{ $blog->meta_description }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9 col-form-label">
                                <div class="row">
                                    <div class="col-6 colxs-12">
                                        <label>Blog Image</label>
                                        <div class="form-check checkbox">
                                            <input type="file" name="image" class="form-control" onchange="preview()">
                                            <img id="frame" src="{{ Storage::url($blog->image) }}" width="100px"
                                                height="100px" />
                                        </div>
                                    </div>
                                    <div class="col-6 colxs-12">
                                        <label>Blog Banner Image</label>
                                        <div class="form-check checkbox">
                                            <input type="file" name="blog_inner_banner" class="form-control" onchange="BlogBannerpreview()">
                                            <img id="frameBlogBanner" src="{{ Storage::url($blog->blog_inner_banner) }}" width="100px"
                                                height="100px" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-1 col-form-label">Publish</label>
                            <div class="col-md-9 col-form-label">
                                <div class="row">
                                    <div class="col-3 colxs-12">
                                        <div class="form-check checkbox">
                                            <input class="form-check-input" id="publish" name="publish" type="checkbox"
                                                value="true" {{ $blog->publish==1?'checked':'' }}>
                                            <label class="form-check-label" for="publish">Publish</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    function preview() {
        frame.src=URL.createObjectURL(event.target.files[0]);
    }
    function BlogBannerpreview() {
        frameBlogBanner.src=URL.createObjectURL(event.target.files[0]);
    }
</script>
