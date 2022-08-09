@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('address.index') }}">Address</a></li>
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
            <form method="post" action="{{ route('address.update',$address->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Edit Address</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input name="country" class="form-control" value="{{ $address->country }}" placeholder="Enter Country" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input name="city" class="form-control" value="{{ $address->city }}" placeholder="Enter City">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input name="address" class="form-control" value="{{ $address->address }}" placeholder="Enter Address" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email1">Email1</label>
                                    <input name="email1" class="form-control" value="{{ $address->email1 }}" placeholder="Enter Email1">
                                </div>
                            </div><div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email2">Email2</label>
                                    <input name="email2" class="form-control" value="{{ $address->email2 }}" placeholder="Enter Email2" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Phoe</label>
                                    <input name="phone" class="form-control" value="{{ $address->phone }}" placeholder="Enter Phoe">
                                </div>
                            </div><div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone2">Phone2</label>
                                    <input name="phone2" class="form-control" value="{{ $address->phone2 }}" placeholder="Enter Phone2" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="map_link">Map</label>
                                    <input name="map_link" class="form-control" value="{{ $address->map_link }}" placeholder="Enter Map">
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 col-form-label">
                                <div class="row">
                                    <div class="col-4 colxs-12">
                                        <label>Address Image</label>
                                        <div class="form-check checkbox">
                                            <input type="file" name="image" class="form-control" onchange="preview()">
                                            <img id="frame" src="{{ Storage::url($address->image) }}" width="100px"
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
                                                value="true" {{ $address->publish==1?'checked':'' }}>
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
