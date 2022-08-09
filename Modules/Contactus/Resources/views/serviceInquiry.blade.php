@extends('layouts.app')

@section('breadcrumb')
<ol class="m-0 border-0 breadcrumb">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="{{ route('contactus.serviceInquiry') }}">Service Inquiry</a></li>

    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
</ol>
{{-- @can('Add Contact')
<button class="float-right p-2 mb-2 btn btn-sm btn-primary" style="margin-top:10px"
    onclick="window.location='{{ route('contactus.serviceInquiry') }}'">Add
    Contact</button>
@endcan --}}
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
                <div class="card-header"><i class="fa fa-align-justify"></i> Service Inquiry</div>
                <div class="card-body">
                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Service</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contactuss as $key=>$contactus)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $contactus->name }}</td>
                                <td>{{ $contactus->email }}</td>
                                <td>{{ $contactus->phone_no }}</td>
                                <td>{{ @$contactus->service->title }}</td>
                                <td>
                                    {{ html_entity_decode(strip_tags($contactus->message)) }}
                                </td>

                                <td>
                                    <a href=""  class="btn btn-success btn-sm view" data-id="{{$contactus->id}}"><i class="fa fa-eye"></i></a>
                                    <button data-question="Are you sure to delete the data?" data-toggle="confirm" data-id="{{ $contactus->id }}" class="btn btn-xs btn-danger">Delete</button>
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
                        @forelse ($contactuss as $key=>$contactus)
                        <div class="team">
                            <div class="row">

                                <div class="name col-sm-6">
                                    <p> <strong>Full Name</strong> :
                                        {{ $contactus->name }}
                                    </p>
                                </div>
                                <div class="name col-sm-6">
                                    <p> <strong>Email</strong> :
                                        {{ $contactus->email }}
                                    </p>
                                </div>
                                <div class="name col-sm-6">
                                    <p> <strong>Phone No</strong> :
                                        {{ $contactus->phone_no }}
                                    </p>
                                </div>
                                <div class="name col-sm-6">
                                    <p> <strong>Service Name</strong> :
                                        {{ @$contactus->service->title }}
                                    </p>
                                </div>
                                <div class="name col-sm-12">
                                    <p> <strong>Message</strong> :
                                        {{ html_entity_decode(strip_tags($contactus->message)) }}
                                    </p>
                                </div>
                            </div>
                            <div class="details">
                                {{-- <div class="staus">
                                    {!! $contactus->publish?'<span
                                        class="badge badge-pill badge-success">Active</span>':'<span
                                        class="badge badge-pill badge-warning">Inactive</span>' !!}
                                </div> --}}
                                <div class="action d-flex">
                                    {{-- <div class="p-3 edit"
                                        onclick="window.location=`{{ route('contactus.edit',['id'=>$contactus->id]) }}`">
                                        <i class="fas fa-edit"></i>
                                    </div> --}}
                                    <div class="p-3 delete" data-toggle="confirm" data-id="{{ $contactus->id }}">
                                        <i class="far fa-trash-alt"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @empty
                        <p>Data Not Found</p>
                        @endforelse
                    </div> -->
                    {{ $contactuss->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          {{-- <h4 class="modal-title">Details</h4> --}}
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            var url = '{{ route("contactus.delete", ":id") }}';
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
                var url = '{{ route("contactus.delete", ":id") }}';
                url = url.replace(':id', id);
                window.location=url
                });
            }
        });
    });

</script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){
        $(".view").click(function(e) {
            e.preventDefault();
            id=$(this).data('id');
            $.ajax({
                method:"post",
                url:"{{route('viewService')}}",
                data:{id:id},
                success:function(data){
                    console.log("Hello world");
                    console.log(data);
                    $('#myModal .modal-body').html(data);
                    $('#myModal').modal('show');
                }
            });
        });
    });
</script>

@endpush
