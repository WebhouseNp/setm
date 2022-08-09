@extends('frontend::layouts.master')
@section('title','Appointment')
@section('content')

<!-- banner section start here -->
<div class="page-header bg_img" style="background-image: url(frontend/images/banner/page-header/01.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12 aos-init" data-aos="fade-right" data-aos-delay="300" data-aos-duration="1000">
                <div class="page-header-area">
                    <h3 class="page-header-title">Online Appointment</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="mb-0 bg-transparent breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Online Appointment</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section ending here -->

<!-- Contact section start here -->
<section class="appointment padding-tb bg-ash">
    <div class="container">
        <div class="appointment-wrap">
            @include('errors.validation-error')
            @if(Session::has('success'))
            @include('success.success',['success'=>Session::get('success')])
            @endif
            @if(Session::has('error'))
            @include('errors.catch-error',['catch_error'=>Session::get('error')])
            @endif
            <form method="POST" action="{{ route('appointmentPost') }}">
                @csrf
                <h5 class="appointment-title">Doctors Information</h5>
                <div class="row">
                    <div class="mb-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="departments">Departments</label>
                            <select name="department" id="departments" class="form-control" required>
                                <option value="">Select Departments</option>
                                <option value="LAB">Lab</option>
                                <option value="PCR">PCR</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="doctor">Doctors</label>
                            <select name="doctor" id="doctor" class="form-control" required>
                                <option value="Anyone">Any</option>
                                @foreach($teams as $team)
                                <option value="{{ $team->name }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <h5 class="appointment-title">Patient Information</h5>
                <div class="row">
                    <div class="mb-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="patientNo">Patient No:</label>
                            <input type="text" class="form-control" name="patient_no" id="patientNo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="patientName">Name*</label>
                            <input type="text" class="form-control" name="name" id="patientName" required>
                        </div>
                    </div>
                    <div class="mb-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="patientEmail">Email*</label>
                            <input type="email" class="form-control" name="email" id="patientEmail" required>
                        </div>
                    </div>
                    <div class="mb-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="patientContact">Contact*</label>
                            <input type="text" class="form-control" name="contact" id="patientContact" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="patientAddress">Address*</label>
                            <input type="text" class="form-control" name="address" id="patientAddress" required>
                        </div>
                    </div>
                    <div class="mb-4 col-md-2 col-6">
                        <div class="form-group">
                            <label for="patientSex">Sex*</label>
                            <select name="sex" id="patientSex" class="form-control" required>
                                <option value="MALE">Male</option>
                                <option value="FEMALE">Female</option>
                                <option value="OTHERS">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 col-md-2 col-6">
                        <div class="form-group">
                            <label for="patientAge">Age*</label>
                            <select name="age" id="patientAge" class="form-control" required>
                                <option>Less than 1</option>
                                <option>1 - 10</option>
                                <option>10 - 19</option>
                                <option>19 - 35</option>
                                <option>35 - 60</option>
                                <option>60+</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h5 class="appointment-title">Schedule Information</h5>
                <div class="row">
                    <div class="mb-4 col-md-4 col-12">
                        <div class="form-group">
                            <label for="appointmentDate">Appointment date</label>
                            <input type="date" class="form-control" name="date" id="appointmentDate" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="details">Your Details*</label>
                            <textarea name="description" id="details" cols="30" rows="7" class="form-control"
                                required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="text-white btn lab-btn">Request For An Appointment</button>
            </form>
        </div>
    </div>
</section>
@endsection
