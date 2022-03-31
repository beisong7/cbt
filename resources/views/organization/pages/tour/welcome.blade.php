@section('css_plugins')

@endsection
@extends('organization.layouts.tour')

@section('content')

    <div class="mt-2 p-4" style="width: 100vw">

        <div id="welcomeTour" class="carousel slide" data-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="widget m-3">
                        <div class="widget-content widget-content-area br-6 p-5 " style="width: 100%; min-height: 80vh">
                            <p class="text-center mt-5">Hi {{ $person->names }},</p>
                            <h3 class="text-center mb-5">Welcome To</h3>
                            <p class="text-center mt-4">
                                <img src="{{ url('organization/assets/themes/light/img/90x90.png') }}" alt="Evalnode" style="width: 100px">
                            </p>
                            <h1 class="text-center text-uppercase bold mt-4 ">Evalnode</h1>
                            <p class="text-center mb-5">The online Assessment Management Application</p>

                            <div class="text-center mt-5">
                                <div class="btn-group flex" role="group" aria-label="Basic example" style="width: 300px">
                                    <a href="{{ route('staff.end.tour') }}" class="btn btn-outline-dark">Skip</a>
                                    <a href="#welcomeTour" role="button" data-slide="next" class="carousel-control-next btn btn-dark">
                                        Begin Tour
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="widget m-3">

                        <div class="widget-content widget-content-area br-6 p-5 " style="width: 100%; min-height: 80vh">
                            @include('organization.pages.tour.partials.intro_one')

                        </div>
                    </div>

                </div>
                <div class="carousel-item">
                    <div class="widget m-3">

                        <div class="widget-content widget-content-area br-6 p-5 " style="width: 100%; min-height: 80vh">
                            @include('organization.pages.tour.partials.intro_two')

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="widget m-3">

                        <div class="widget-content widget-content-area br-6 p-5 " style="width: 100%; min-height: 80vh">
                            @include('organization.pages.tour.partials.intro_two_b')

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="widget m-3">

                        <div class="widget-content widget-content-area br-6 p-5 " style="width: 100%; min-height: 80vh">
                            @include('organization.pages.tour.partials.intro_three')
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="widget m-3">
                        <div class="widget-content widget-content-area br-6 p-5 " style="width: 100%; min-height: 80vh">
                            <h2 class="text-center mt-5">Great!</h2>

                            <p class="text-center">We are ready to dive into action!</p>

                            <p class="text-center mt-5">
                                <img src="{{ url('assets/svg/dive.svg') }}" alt="" style="width: 300px">
                            </p>
                            <div class="text-center mt-5">
                                <div class="btn-group flex" role="group" aria-label="Basic example" style="width: 300px">
                                    <a href="#welcomeTour" role="button" data-slide="prev" class="carousel-control-prev btn btn-outline-dark">
                                        Previous
                                    </a>
                                    <a href="{{ route('staff.end.tour') }}" class="btn btn-dark">Dive In</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection