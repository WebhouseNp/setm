@extends('layouts.app')
@section('breadcrumb')
<ol class="m-0 border-0 breadcrumb">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item"><a href="#">Site Info</a></li>
    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
</ol>
@endsection
<style>

    .content {
        width: 100%;
        padding: 0;
        margin: 0 auto;
    }

    .question {
        position: relative;
        background: #fff;
        margin: 0;
        padding: 10px 10px 10px 50px;
        display: block;
        width:100%;
        cursor: pointer;
    }

    .answers {
        padding: 0px 15px;
        margin: 5px 0;
        width:100%!important;
        height: 0;
        overflow: hidden;
        /* z-index: -1; */
        position: relative;
        opacity: 0;
        -webkit-transition: .3s ease;
        -moz-transition: .3s ease;
        -o-transition: .3s ease;
        transition: .3s ease;
    }

    .questions:checked ~ .answers{
        height: auto;
        opacity: 1;
        background: #fff;
        padding: 15px;
    }

    .plus {
        position: absolute;
        margin-left: 10px;
        z-index: 5;
        font-size: 2em;
        line-height: 100%;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
        -webkit-transition: .3s ease;
        -moz-transition: .3s ease;
        -o-transition: .3s ease;
        transition: .3s ease;

    }

    .questions:checked ~ .plus {
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .questions {
        display: none;
    }

</style>
@section('content')

<div class="container-fluid">
    @include('errors.validation-error')
        @if(Session::has('error'))
            @include('errors.catch-error',['catch_error'=>Session::get('error')])
        @endif
    <form method="post" action="{{ route('site.update',$site->id) }}" enctype="multipart/form-data">
    @csrf
        <div class="content">
            <div>
                <input type="checkbox" id="question1" name="q"  class="questions">
                <div class="plus">+</div>
                <label for="question1" class="question font-weight-bold">
                    SEO DETAILS:
                </label>
                <div class="answers">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="title">Site Title</label>
                                <input name="title" class="form-control" value="{{ $site->title }}" placeholder="Enter Site Title"  required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control">
                                    {{ $site->description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title"
                                    value="{{ $site->meta_title }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="meta_keyword">Meta KeyWord</label>
                                <input type="text" name="meta_keyword" class="form-control" placeholder="Enter Meta Keyword"
                                    value="{{ $site->meta_keyword }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <input type="checkbox" id="question2" name="q" class="questions">
                <div class="plus">+</div>
                <label for="question2" class="question font-weight-bold">
                    SOCIAL MEDIA LINKS:
                </label>
                <div class="answers">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" class="form-control" placeholder="Enter Facebook Link"
                                    value="{{ $site->facebook }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" class="form-control" placeholder="Enter Instagram Link"
                                    value="{{ $site->instagram }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="whatsapp">Whatsapp</label>
                                <input type="text" name="whatsapp" class="form-control" placeholder="Enter Whatsapp Number"
                                    value="{{ $site->whatsapp }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <input type="text" name="youtube" class="form-control" value="{{ $site->youtube }}" placeholder="Enter Youtube Link">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" class="form-control" value="{{ $site->twitter }}" placeholder="Enter Twitter Link">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="text" name="linkedin" class="form-control" value="{{ $site->linkedin }}" placeholder="Enter LinkedIn Link">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="messanger">Messanger Link</label>
                                <input type="text" name="messanger" class="form-control" value="{{ $site->messanger }}" placeholder="Enter Messanger Link">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="skype">Skype</label>
                                <input type="text" name="skype" class="form-control" value="{{ $site->skype }}" placeholder="Enter Sykpe Link">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="viber">Viber</label>
                                <input type="text" name="viber" class="form-control" value="{{ $site->viber }}" placeholder="Enter Viber Number">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="video">Video Link</label>
                                <input type="text" name="video" class="form-control" value="{{ $site->video }}" placeholder="Enter Video Link">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <input type="checkbox" id="question3" name="q" class="questions">
                <div class="plus">+</div>
                <label for="question3" class="question font-weight-bold">
                    ADDRESS & CONTACT INFO:
                </label>
                <div class="answers">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email1" class="form-control" value="{{ $site->email1 }}" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email2">Alternative Email</label>
                                <input type="text" name="email2" class="form-control" value="{{ $site->email2 }}" placeholder="Enter Alternative Email">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="contact1">Contact (International Format)</label>
                                <input type="text" name="contact1" class="form-control" placeholder="Enter Contact Number "
                                    value="{{ $site->contact1 }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="contact2">Alternative Contact</label>
                                <input type="text" name="contact2" class="form-control" placeholder="Enter Alternative Contact Number"
                                    value="{{ $site->contact2 }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $site->address }}" placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="map">Map</label>
                                <input type="text" name="map" class="form-control" value="{{ $site->map }}" placeholder="map">
                                {{-- <textarea name="map" class="form-control">{{ $site->map  }}</textarea> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <input type="checkbox" id="question4" name="q" class="questions">
                <div class="plus">+</div>
                <label for="question4" class="question font-weight-bold">
                    COUNTER:
                </label>
                <div class="answers">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="counter">Company Breaches</label>
                                <input type="text" name="title1" class="form-control" value="{{ $site->title1 }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="counter2">Botnet Activities</label>
                                <input type="text" name="title2" class="form-control" value="{{ $site->title2 }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="counter3">Ransomeware Attacks</label>
                                <input type="text" name="title3" class="form-control" value="{{ $site->title3 }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="title4">US Dollar impact</label>
                                <input type="text" name="title4" class="form-control" value="{{ $site->title4 }}"
                                    required>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <input type="checkbox" id="question5" name="q" class="questions">
                <div class="plus">+</div>
                <label for="question5" class="question font-weight-bold">
                    ABOUT US:
                </label>
                <div class="answers">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="about_title">Title</label>
                                <input name="about_title" class="form-control" value="{{ $site->about_title }}" placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="about_description">Description</label>
                                <textarea name="about_description" class="form-control">{{ $site->about_description  }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Image First</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="about_image1" class="form-control"
                                                onchange="about_image1Preview()">
                                            <img id="about_image1" src="{{ Storage::url($site->about_image1) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Image Second</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="about_image2" class="form-control"
                                                onchange="about_image2Preview()">
                                            <img id="about_image2" src="{{ Storage::url($site->about_image2) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Image Third</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="about_image3" class="form-control"
                                                onchange="about_image3Preview()">
                                            <img id="about_image3" src="{{ Storage::url($site->about_image3) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Image Fourth</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="about_image4" class="form-control"
                                                onchange="about_image4Preview()">
                                            <img id="about_image4" src="{{ Storage::url($site->about_image4) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <input type="checkbox" id="question9" name="q" class="questions">
                <div class="plus">+</div>
                <label for="question9" class="question font-weight-bold">
                    SUSTAINABLE DEVELOPMENT:
                </label>
                <div class="answers">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="sd_description">Description</label>
                                <textarea name="sd_description" class="form-control">
                                    {{ $site->sd_description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">SD Image First</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="sd_image1" class="form-control"
                                                onchange="sd_image1Preview()">
                                            <img id="sd_image1" src="{{ Storage::url($site->sd_image1) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">SD Image Second</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="sd_image2" class="form-control"
                                                onchange="sd_image2Preview()">
                                            <img id="sd_image2" src="{{ Storage::url($site->sd_image2) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div>
                <input type="checkbox" id="question10" name="q" class="questions">
                <div class="plus">+</div>
                <label for="question10" class="question font-weight-bold">
                   ALL PAGE SUB-TITLES:
                </label>
                <div class="answers">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="whatwedo_subtitle">what We Do Sub-tile (what We Do Page)</label>
                                <textarea name="whatwedo_subtitle" class="form-control">
                                    {{ $site->whatwedo_subtitle }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="ouractivities_subtitle">Our Ativities Sub-tile (Our Ativities Page)</label>
                                <textarea name="ouractivities_subtitle" class="form-control">
                                    {{ $site->ouractivities_subtitle }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <input type="checkbox" id="question11" name="q" class="questions">
                <div class="plus">+</div>
                <label for="question11" class="question font-weight-bold">
                    LOGO & BANNER IMAGES:
                </label>
                <div class="answers">
                    <div class="row">
                        <div class="col-sm-4">
                            <label class="col-form-label">Header Logo</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="header_logo" class="form-control"
                                                onchange="headerPreview()">
                                            <img id="header_logo" src="{{ Storage::url($site->header_logo) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Footer Logo</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="footer_logo" class="form-control"
                                                onchange="footerPreview()">
                                            <img id="footer_logo" src="{{ Storage::url($site->footer_logo) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Fav Icon</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="fav_icon" class="form-control"
                                                onchange="favPreview()">
                                            <img id="fav_icon" src="{{ Storage::url($site->fav_icon) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">ContactUS Page Banner Image</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="contactus_banner_image" class="form-control"
                                                onchange="contactus_banner_imagePreview()">
                                            <img id="contactus_banner_image" src="{{ Storage::url($site->contactus_banner_image) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Who we Are Page Banner Image</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="whoweare_banner_image" class="form-control"
                                                onchange="whoweare_banner_imagePreview()">
                                            <img id="whoweare_banner_image" src="{{ Storage::url($site->whoweare_banner_image) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">What We Serve Page Banner Image</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="whatweserve_banner_image" class="form-control"
                                                onchange="whatweserve_banner_imagePreview()">
                                            <img id="whatweserve_banner_image" src="{{ Storage::url($site->whatweserve_banner_image) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">What We Do Page Banner Image</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="whatwedo_banner_image" class="form-control"
                                                onchange="whatwedo_banner_imagePreview()">
                                            <img id="whatwedo_banner_image" src="{{ Storage::url($site->whatwedo_banner_image) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label">Our Activities Page Banner Image</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="ouractivities_banner_image" class="form-control"
                                                onchange="ouractivities_banner_imagePreview()">
                                            <img id="ouractivities_banner_image" src="{{ Storage::url($site->ouractivities_banner_image) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-form-label">News Page Banner Image</label>
                            <div class="col-form-label">
                                <div class="row">
                                    <div class="col-12 colxs-12">
                                        <div class="form-check checkbox">
                                            <input type="file" name="news_banner_image" class="form-control"
                                                onchange="news_banner_imagePreview()">
                                            <img id="news_banner_image" src="{{ Storage::url($site->news_banner_image) }}"
                                                width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>

@endsection
<script>
    function about_image1Preview(){
        about_image1.src = URL.createObjectURL(event.target.files[0]);
    }
    function about_image2Preview(){
        about_image2.src = URL.createObjectURL(event.target.files[0]);
    }
    function about_image3Preview(){
        about_image3.src = URL.createObjectURL(event.target.files[0]);
    }
    function about_image4Preview(){
        about_image4.src = URL.createObjectURL(event.target.files[0]);
    }

    function sd_image1Preview(){
        sd_image1.src = URL.createObjectURL(event.target.files[0]);
    }

    function sd_image2Preview(){
        sd_image2.src = URL.createObjectURL(event.target.files[0]);
    }
    function contactus_banner_imagePreview(){
        contactus_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }
    function whoweare_banner_imagePreview(){
        whoweare_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }
    function whatweserve_banner_imagePreview(){
        whatweserve_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }
    function whatwedo_banner_imagePreview(){
        whatwedo_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }
    function ouractivities_banner_imagePreview(){
        ouractivities_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }
    function news_banner_imagePreview(){
        news_banner_image.src = URL.createObjectURL(event.target.files[0]);
    }
    function headerPreview() {
        header_logo.src=URL.createObjectURL(event.target.files[0]);
    }
    function footerPreview() {
        footer_logo.src=URL.createObjectURL(event.target.files[0]);
    }
    function favPreview(){
        fav_icon.src = URL.createObjectURL(event.target.files[0]);
    }

</script>
