@extends('layouts.app')

@section('breadcrumb')
<ol class="m-0 border-0 breadcrumb">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('page.index') }}">Page</a></li>

    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
</ol>
@can('Add Page')
<button class="float-right p-2 mb-2 btn btn-sm btn-primary" style="margin-top:10px"
    onclick="window.location='{{ route('page.create') }}'">Add
    Page</button>
@endcan
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

            </div>
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Page</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Short Description</th>
                                <th>Full Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pages as $key=>$page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>
                                    {{ Str::limit(html_entity_decode(strip_tags($page->description)),100,'......') }}
                                </td>
                                <td>
                                    {{ Str::limit(html_entity_decode(strip_tags($page->page_full_description)),200,'......') }}
                                </td>
                                <td>
                                    <img src="{{Storage::url($page->image)}}" height="100">
                                </td>
                                <td>
                                    {!! $page->publish?'<span
                                        class="badge badge-pill badge-success">Active</span>':'<span
                                        class="badge badge-pill badge-warning">Inactive</span>' !!}
                                </td>
                                <td>
                                    <button class="btn btn-xs btn-info"
                                    onclick="window.location=`{{ route('page.edit',['id'=>$page->id]) }}`">Edit</button>
                                    @if(!in_array($page->slug, $readonlyslug))
                                        <button data-question="Are you sure to delete the data?" data-toggle="confirm" data-id="{{ $page->id }}" class="btn btn-xs btn-danger">Delete</button>
                                        @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Data Not Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- <div class="scrolling-pagination">
                        @forelse ($pages as $key=>$page)
                        <div class="team">
                            <div class="row">

                                <div class="name col-sm-6">
                                    <p> <strong>Title</strong> :
                                        {{ $page->title }}
                                    </p>
                                </div>
                                <div class="name col-sm-6">
                                    <p> <strong>Slug</strong> :
                                        {{ $page->slug }}
                                    </p>
                                </div>
                                <div class="name col-sm-12">
                                    <p> <strong>Page Short Description</strong> :
                                        {{ Str::limit(html_entity_decode(strip_tags($page->description)),100,'......') }}
                                    </p>
                                </div>
                                <div class="name col-sm-12">
                                    <p> <strong>Page Full Description</strong> :
                                        {{ Str::limit(html_entity_decode(strip_tags($page->page_full_description)),200,'......') }}
                                    </p>
                                </div>
                                <div class="team-title col-sm-12">
                                    <img src="{{Storage::url($page->image)}}" height="200">
                                </div>
                            </div>
                            <div class="details">
                                <div class="staus">
                                    {!! $page->publish?'<span
                                        class="badge badge-pill badge-success">Active</span>':'<span
                                        class="badge badge-pill badge-warning">Inactive</span>' !!}
                                </div>
                                <div class="action d-flex">
                                    <div class="p-3 edit"
                                        onclick="window.location=`{{ route('page.edit',['id'=>$page->id]) }}`">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    @if(!in_array($page->slug, $readonlyslug))
                                        <div class="p-3 delete" data-toggle="confirm" data-id="{{ $page->id }}">
                                            <i class="far fa-trash-alt"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        @empty
                        <p>Data Not Found</p>
                        @endforelse
                    </div> -->
                    {{ $pages->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('page_scripts')
<style>
    .team-heading {
        color: blue;
        font-size: 14px;
    }

    .details {

        padding-top: 10px;
        padding-bottom: 10px;
        font-size: 20px;
    }

    .edit {
        color: blue;
    }

    .edit:hover {
        border-radius: 50px;
        background-color: whitesmoke;
    }

    .delete {
        color: red;
    }

    .delete:hover {
        border-radius: 50px;
        background-color: whitesmoke;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
    $(function(){
        $('[data-toggle="confirm"]').jConfirm().on('confirm', function(e){
            var btn = $(this),
            id = btn.data('id');
            var url = '{{ route("page.delete", ":id") }}';
            url = url.replace(':id', id);
            window.location=url
        });
    });

    $('ul.pagination').hide();
    $(function() {
        $('.card').jscroll({
            loadingHtml: `<center><img src="https://i.pinimg.com/originals/ec/d6/bc/ecd6bc09da634e4e2efa16b571618a22.gif" width="150px" height="120px"></center>`,
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.card-body',
            callback: function() {
                $('ul.pagination').remove();
                $('[data-toggle="confirm"]').jConfirm().on('confirm', function(e){
                var btn = $(this),
                id = btn.data('id');
                var url = '{{ route("page.delete", ":id") }}';
                url = url.replace(':id', id);
                window.location=url
                });
            }
        });
    });

</script>
@endpush
