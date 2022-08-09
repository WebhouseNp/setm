@extends('frontend::layouts.master')
@section('title','Submit an Incident')
@section('content')

<!-- ======= Banner Start ======= -->
<section class="banner-service" style="background-image:url(
    @if (isset($dashboard_site->contact_banner))
        {{ Storage::url($dashboard_site->contact_banner) }}
    @else
        {{ asset('images/banner.jpg') }}
    @endif
    )">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                <h2 class="banner-service-title">Submit an Incident</h2>
                <p>
                    Get Started
                </p>
            </div>
        </div>
    </div>
</section>
<!-- ======= Banner End ======= -->



<!-- Contact section start here -->
<section class="py-3 appointment padding-tb bg-ash py-lg-5">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-lg-8 col-sm-12">
                <div class="appointment-wrap">
                <form method="POST" action="{{ route('incidentPost') }}">
                    @csrf
                    <h5 class="incident-title">Incident Information</h5>
                    <!-- alerts -->
                    @if (session('message'))
                        <div class="alert alert-primary alert-dismissible text-capitalize text-center" id="successMessage" style="z-index: 999;">
                            <a href="#" data-dismiss="alert" aria-label="close"></a>
                            {{ session('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible text-capitalize text-center" id="errorMessage">
                            <a href="#" data-dismiss="alert" aria-label="close"></a>
                                <ul style="list-style: none;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date" id="date" required>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" name="time" id="time" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" required>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="office">Office <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="office" id="office" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="title">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="patientEmail" required>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="contact">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="contact" id="contact" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="incidentDate">Date of Incident</label>
                                <input type="date" class="form-control" name="incidentDate" id="incidentDate" required>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6 col-12">
                            <div class="form-group">
                                <label for="incidentTime">Time of Incident</label>
                                <input type="time" class="form-control" name="incidentTime" id="incidentTime" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="location">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="location" id="location" required>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="appName">System or Application <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="appName" id="appName" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-4 col-md-12">
                            <div class="form-group">
                                <label for="details">Description of Incident <span class="text-danger">*</span></label>
                                <textarea name="description" id="details" cols="30" rows="7" class="form-control"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn lab-btn">Submit Incident</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#errorMessage").delay(2000).slideUp(500);
            $("#successMessage").delay(4000).slideUp(500);
        });

    </script>
@endpush
@endsection
