@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
</ol>
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="col-lg-12">
            @if(Session::has('error'))
            @include('errors.catch-error',['catch_error'=>Session::get('error')])
            @endif
            @if(Session::has('success'))
            @include('success.success',['success'=>Session::get('success')])
            @endif
            <div>
                @can('Add User')
                <button class="btn btn-sm btn-primary mb-2" onclick="window.location='{{ route('user.create') }}'">Add
                    User</button>
                @endcan
            </div>
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Users</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key=>$user)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->publish==1)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @can('Edit User')
                                    <button class="btn btn-xs btn-info"
                                        onclick="window.location='{{ route('user.edit',$user->id) }}'">Edit</button>
                                    @endcan
                                    @can('Delete User')
                                    <button data-question="Are you sure to delete the data?" data-toggle="confirm"
                                        data-id="{{ $user->id }}" class="btn btn-xs btn-danger">Delete</button>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Data Not Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page_scripts')
<script>
    $(function(){
        $('[data-toggle="confirm"]').jConfirm().on('confirm', function(e){
            var btn = $(this),
            id = btn.data('id');
            var url = '{{ route("user.delete", ":id") }}';
            url = url.replace(':id', id);
            window.location=url
        });
    });
</script>
@endpush
