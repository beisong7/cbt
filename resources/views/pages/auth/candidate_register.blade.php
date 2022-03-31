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
                    <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>Registration</strong></h5>
                    <h2 class="text-center text-primary"><i class="fa fa-user"></i></h2>
                    <h2>Candidate / Registration</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    @include('layouts.notice')
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-sm-12 col-md-6">
                    @include('pages.auth.signup_form')
                </div>
            </div>
        </div>
    </section>
    <!-- ENDs ection -->

@endsection