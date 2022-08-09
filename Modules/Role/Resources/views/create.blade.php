@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></li>
    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-lg-12">
            @include('errors.validation-error')
            @if(isset($error))
            @include('errors.catch-error',['catch_error'=>$error])
            @endif
            <form method="post" action="{{ route('role.store') }}">
                @csrf
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Add Role</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Role</label>
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder="Enter Role Name">
                                </div>
                            </div>
                        </div>
                        <div>Permissions</div>
                        <div class="form-group row">
                            <div class="col-md-12 col-form-label">
                                @foreach($permissions as $permission)
                                <div class="row" id="{{ $permission->group }}">
                                    <div class="col-2">
                                        <strong>{{ $permission->group }}</strong>
                                        <input type="checkbox" id="{{ 'check'.$permission->group }}"
                                            onchange="checkAll(this)">
                                    </div>
                                    <div class="col-10">
                                        <div class="row">
                                            @foreach($permission->permissions as $per)
                                            <div class="col-3 col-xs-3">
                                                <div class="form-check checkbox">
                                                    <input class="form-check-input" id="{{ $per->id }}"
                                                        name="permissions[]" type="checkbox" value="{{ $per->id }}">
                                                    <label class="form-check-label" for={{ $per->id }}>{{
                                                        $per->name }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
    function checkAll(me){

        var divid = $(me).closest('.row').attr('id');
        if($(me).is(":checked")){
            $("#" + divid).find("input").prop("checked", true);
        }else{
            $("#" + divid).find("input").prop("checked", false);
        }

    }
</script>
