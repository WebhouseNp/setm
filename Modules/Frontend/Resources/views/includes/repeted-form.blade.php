<section class="contact-section style-1 padding-tb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="section-header text-lg-left">
                    <h2><span class="d-block">Have A Questions?</span> Chat With <span class="theme-color">Professional
                            Doctor</span></h2>
                </div>
                <div class="section-wrapper">
                    @include('errors.validation-error')
                    @if(Session::has('success'))
                    @include('success.success',['success'=>Session::get('success')])
                    @endif
                    @if(Session::has('error'))
                    @include('errors.catch-error',['catch_error'=>Session::get('error')])
                    @endif
                    <form method="POST" action="{{ route('question') }}">
                        @csrf
                        <input type="text" name="name" placeholder="Your Name">
                        <input type="text" name="phone" placeholder="Your Phone">
                        <input type="text" name="service" placeholder="Type of Service">
                        <input type="date" name="from" placeholder="From">
                        <input type="date" name="to" placeholder="To">
                        <button type="submit" class="lab-btn"><span>Check Availability <i
                                    class="icofont-rounded-double-right"></i></span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
