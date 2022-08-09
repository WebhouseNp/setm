@extends('layouts.app')

@section('breadcrumb')
<ol class="m-0 border-0 breadcrumb">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('whatwedo.index') }}">What We Do</a></li>

    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
</ol>
@can('Add Whatwedo')
<button class="float-right p-2 mb-2 btn btn-sm btn-primary" style="margin-top:10px"
    onclick="window.location='{{ route('whatwedo.create') }}'">Add
    What We Do</button>
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
                <div class="card-header"><i class="fa fa-align-justify"></i> What We Do</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="row_drag">
                            @forelse ($whatwedos as $key=>$whatwedo)
                            <tr data-id="{{$whatwedo->id}}">

                                <td>{{ $whatwedo->title }}</td>
                                <td>
                                    {{ Str::limit(html_entity_decode(strip_tags($whatwedo->description)),100,'......') }}
                                </td>


                                <td>
                                    <img src="{{Storage::url($whatwedo->image)}}" height="100">
                                </td>

                                <td>{!! $whatwedo->publish?'<span
                                        class="badge badge-pill badge-success">Active</span>':'<span
                                        class="badge badge-pill badge-warning">Inactive</span>' !!}</td>
                                <td>
                                    <button class="btn btn-xs btn-info"
                                    onclick="window.location=`{{ route('whatwedo.edit',['id'=>$whatwedo->id]) }}`">Edit</button>
                                    <button data-question="Are you sure to delete the data?" data-toggle="confirm" data-id="{{ $whatwedo->id }}" class="btn btn-xs btn-danger">Delete</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Data Not Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $whatwedos->links('pagination::bootstrap-4') }}
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
            var url = '{{ route("whatwedo.delete", ":id") }}';
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
                var url = '{{ route("whatwedo.delete", ":id") }}';
                url = url.replace(':id', id);
                window.location=url
                });
            }
        });
    });

</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    $( ".row_drag" ).sortable({
        delay: 100,
        stop: function() {
            var selectedRow = new Array();
            $('.row_drag>tr').each(function() {
                selectedRow.push($(this).attr("id"));
            });
           let data=[];
           $('.row_drag>tr').each(function(key,ele){
               data.push({'id':$(this).attr("data-id"),'order_row':key});
           });
           $.ajax({
              type:"POST",
              data :{"_token":"{{csrf_token()}}","data":data},
              url:"{{route('whatwedo.update.order')}}",
           });
        }
    });
</script> --}}
@endpush
