@extends('layouts.app')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>

    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
</ol>
@can('Add News')
<button class="btn btn-sm btn-primary mb-2 float-right p-2" style="margin-top:10px"
    onclick="window.location='{{ route('news.create') }}'">Add
    News</button>
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
                <div class="card-header"><i class="fa fa-align-justify"></i>News</div>
                <div class="card-body">
                    <div class="scrolling-pagination">
                        @forelse ($newses as $key=>$news)
                        <div class="team">
                            <div class="row">

                                <div class="name col-sm-6">
                                    <p> <strong>Title</strong> :
                                        {{ $news->title }}
                                    </p>
                                    <p> <strong>Type</strong> :
                                        {{ $news->type }}
                                    </p>
                                </div>
                                <div class="team-title col-sm-6">
                                    <img src="{{Storage::url($news->image)}}" height="200">
                                </div>
                            </div>
                            <div class="details">
                                <div class="staus">
                                    {!! $news->publish?'<span
                                        class="badge badge-pill badge-success">Active</span>':'<span
                                        class="badge badge-pill badge-warning">Inactive</span>' !!}
                                </div>
                                <div class="action d-flex">
                                    <div class="edit p-3"
                                        onclick="window.location=`{{ route('news.edit',['id'=>$news->id]) }}`">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div class="delete  p-3" data-toggle="confirm" data-id="{{ $news->id }}">
                                        <i class="far fa-trash-alt"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @empty
                        <p>Data Not Found</p>
                        @endforelse
                    </div>
                    {{ $newses->links('pagination::bootstrap-4') }}
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
            var url = '{{ route("news.delete", ":id") }}';
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
                var url = '{{ route("news.delete", ":id") }}';
                url = url.replace(':id', id);
                window.location=url
                });
            }
        });
    });

</script>
@endpush
