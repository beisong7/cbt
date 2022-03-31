<?php
    $title = "Login Path";
    $navWhite = "background: #333";
?>

@extends('layouts.main')

@section('content')

    <section class="pb_section bg-light pb_slant-white" id="section-pricing">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-md-6 text-center mb-5">
                    <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>Login</strong></h5>
                    <h2 class="text-center text-primary"><i class="fa fa-suitcase"></i></h2>
                    <h2>Organization Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    @include('layouts.notice')
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-sm-12 col-md-6">
                    <form action="#" class="bg-white rounded pb_form_v1">
                        @csrf
                        <h2 class="mb-4 mt-0 text-center">Enter Credentials</h2>
                        <div class="form-group">
                            <input type="email" class="form-control pb_height-50 reverse" placeholder="Email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control pb_height-50 reverse" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Register">
                        </div>

                        <p class="text-center"><a href="#" class="">Forgot Password</a></p>
                        <p class="text-center"><a href="#" class="">Dont Have A Plan</a></p>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- ENDs ection -->

@endsection