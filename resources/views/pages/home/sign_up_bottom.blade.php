<section class="pb_xl_py_cover overflow-hidden pb_slant-light pb_gradient_v1 cover-bg-opacity-8" id="signup-bottom"  style="background-image: url('{{ url('assets/images/1900x1200_img_5.jpg') }}')">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5 justify-content-center">
                <h2 class="heading mb-5 pb_font-40">Register now with other {{ !empty($numReg)?$numReg->count():'12k' }} people!</h2>
                <div class="sub-heading">
                    <p class="mb-4">Sign up for your account now, Connect with Organizations, Schools, Test Centers, etc and Commence Assessments!</p>
                    <p class="mb-5"><a class="btn btn-dark btn-lg pb_btn-pill smoothscroll" href="{{ route('register') }}"><span class="pb_font-14 text-uppercase pb_letter-spacing-1">Sign Up</span></a></p>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                @include('pages.auth.signup_form')
            </div>
        </div>
    </div>
</section>
<!-- END section -->