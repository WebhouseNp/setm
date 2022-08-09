@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if(Session::has('error'))
    @include('errors.catch-error',['catch_error'=>Session::get('error')])
    @endif
    @if(Session::has('success'))
    @include('success.success',['success'=>Session::get('success')])
    @endif
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                @php
                $countService = \Modules\Service\Entities\Service::latest()->count();
                @endphp
                <div class="col-sm-3">
                    <div id="card" class="card border-primary  mb-3" style="max-width: 18rem;">
                        <div class="card-header" id="num"><h3>{{ $countService }}</h3></div>
                        <div class="card-body text-primary">
                        <h3 class="card-title" id="title">Services</h3>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a id="link" href="{{route('service.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                @php
                $countProduct = \Modules\Product\Entities\Product::latest()->count();
                @endphp
                <div class="col-sm-3">
                    <div id="card" class="card border-primary  mb-3" style="max-width: 18rem;">
                        <div class="card-header" id="num"><h3>{{ $countProduct }}</h3></div>
                        <div class="card-body text-primary">
                        <h3 class="card-title" id="title">Products</h3>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a id="link" href="{{route('product.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                @php
                $countPartner = \Modules\Partner\Entities\Partner::latest()->count();
                @endphp
                <div class="col-sm-3">
                    <div id="card" class="card border-primary  mb-3" style="max-width: 18rem;">
                        <div class="card-header" id="num"><h3>{{ $countPartner }}</h3></div>
                        <div class="card-body text-primary">
                        <h3 class="card-title" id="title">Partners</h3>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a id="link" href="{{route('partner.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                @php
                $countBlog = \Modules\Blog\Entities\Blog::latest()->count();
                @endphp
                <div class="col-sm-3">
                    <div id="card" class="card border-primary  mb-3" style="max-width: 18rem;">
                        <div class="card-header" id="num"><h3>{{ $countBlog }}</h3></div>
                        <div class="card-body text-primary">
                        <h3 class="card-title" id="title">Blogs</h3>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a id="link" href="{{route('blog.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        <p class="card-text"></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    @php
    $contactus = \Modules\Contactus\Entities\Contactus::where('type', 'Contact')->orderBy('created_at', 'DESC')->limit(8)->get();
    // dd($contactus);
    @endphp
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i><a href="{{ route('contactus.index') }}"> <strong>View All Contacts</strong></a></div>
        <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contactus as $key=>$contact)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Str::limit($contact->subject, 50) }}</td>

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

    @php
    $productInquey = \Modules\Contactus\Entities\Contactus::where('type', 'Product Inquire')->orderBy('created_at', 'DESC')->limit(8)->get();
    // dd($productInquey);
    @endphp
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i><a href="{{ route('contactus.productInquiry') }}"> <strong>View All Product Inqueries</strong></a></div>
        <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Inqueri About</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productInquey as $key=>$contact)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{@$contact->product->title}}</td>
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

    @php
    $serviceInquey = \Modules\Contactus\Entities\Contactus::where('type', 'Service Inquire')->orderBy('created_at', 'DESC')->limit(8)->get();
    // dd($serviceInquey);
    @endphp
    <div class="card">
        <div class="card-header"><i class="fa fa-align-justify"></i><a href="{{ route('contactus.serviceInquiry') }}"> <strong>View All Service Inqueries</strong></a></div>
        <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Inqueri About</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($serviceInquey as $key=>$contact)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{@$contact->service->title}}</td>
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
@endsection

