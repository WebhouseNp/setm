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
            <form method="post" action="{{ route('role.update',$role->id) }}">
                @csrf
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Edit Role : {{ $role->name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Role</label>
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder="Enter Role Name" value="{{ $role->name }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Permissions</label>
                            <div class="col-md-9 col-form-label">
                                <div class="row">
                                    @foreach($permissions as $permission)
                                    <div class="col-3 colxs-12">
                                        <div class="form-check checkbox">
                                            <input class="form-check-input" id="{{ $permission->id }}"
                                                name="permissions[]" type="checkbox" value="{{ $permission->id }}"
                                                @if(in_array($permission->id,array_column($role->permissions->toArray(),'id')))
                                            {{ 'checked' }} @endif>
                                            <label class="form-check-label"
                                                for={{ $permission->id }}>{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
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
