@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('workingprocess.index') }}">Working Process</a></li>
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
            <form method="post" action="{{ route('workingprocess.update',$workingprocess->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Edit Working Process</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="title">Working Process Title </label>
                                    <input name="title" class="form-control" value="{{ $workingprocess->title }}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Working Process Description</label>
                                    <textarea name="description" class="form-control">{{ $workingprocess->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-1 col-form-label">Image</label>
                            <div class="col-md-9 col-form-label">
                                <div class="row">
                                    <div class="col-6 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="image" class="form-control" onchange="preview()">
                                            <img id="frame" src="{{ Storage::url($workingprocess->image) }}" width="100px"
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
                                                    value="true" {{ $workingprocess->publish==1?'checked':'' }}>
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
</script>
