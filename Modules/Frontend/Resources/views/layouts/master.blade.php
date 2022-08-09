@php
$site = \Modules\Site\Entities\Site::latest()->first();
// dd($site);
$products = \Modules\Product\Entities\Product::where('publish', 1)->orderBy('created_at', 'DESC')->limit(9)->get();
// dd($products);
@endphp

@include('frontend::includes.header')

@yield('content')

@include('frontend::includes.footer')
@stack('scripts')
