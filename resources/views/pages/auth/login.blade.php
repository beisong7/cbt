<?php
    $title = "Login Path";
    $navWhite = "background: #333";
?>

@extends('layouts.main')

@section('content')

    <section class="pb_section bg-light pb_slant-white" id="section-pricing">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-6 text-center mb-5">
                    <h5 class="text-uppercase pb_font-15 mb-2 pb_color-dark-opacity-3 pb_letter-spacing-2"><strong>Login</strong></h5>
                    <h2>Choose Your Login Path</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="pb_pricing_v1 p-5 border text-center bg-white">
                        <h3>Candidate / Test Taker</h3>
                        <span class="price text-center"><i class="fa fa-user"></i></span>
                        <p class="pb_font-15">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
                        <p class="mb-0"><a href="{{ route('candidate.login') }}" role="button" class="btn btn-secondary">Login</a></p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="pb_pricing_v1 p-5 border border-primary text-center bg-white">
                        <h3>Organization</h3>
                        <span class="price text-center"><i class="fa fa-suitcase"></i></span>
                        <p class="pb_font-15">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts</p>
                        <p class="mb-0"><a href="{{ route('org.login') }}" role="button" class="btn btn-primary btn-shadow-blue">Login</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ENDs ection -->

@endsection