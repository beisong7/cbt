<?php
    $title = "Registration";
    $navWhite = "background: #333";
?>

@extends('layouts.main')

@section('content')

    <section class="pb_section bg-light pb_slant-white" id="section-pricing">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-md-6 text-center mb-5">
                    <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>Registration</strong></h5>
                    <h2 class="text-center text-success"><i class="fa fa-check"></i></h2>
                    <h2>Success</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-6">
                    @include('layouts.notice')
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-sm-12 col-md-6">

                    <div class="card">
                        <div class="card-body mb-4">
                            <p class="text-justify">{{ $message }}</p>
                            <br>
                        <a href="{{ route('candidate.login') }}" class="btn btn-block btn-primary pb_btn-pill  btn-shadow-blue">Candidate Login</a>
                            <br>
                            @if(empty($verified))
                                <a href="{{ route('re.verify.email', [$user_id, 'type'=>$type]) }}" class="btn btn-block btn-primary pb_btn-pill  btn-shadow-blue">Resend Link</a>
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ENDs ection -->

@endsection