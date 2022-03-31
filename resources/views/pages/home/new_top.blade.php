<div section-scroll='0' class="wd_scroll_wrap">
    <header class="gc_main_menu_wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-6">
                    <div class="logo-area">
                        <a href="{{ route('home') }}">
                            <img src="{{ url('assets/images/logo/logo.png') }}" alt="logo" />
                        </a>
                    </div>
                </div>
                <!-- Mobile Menu  Start -->
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-6">
                    <div class="menu-area  hidden-xs">
                        <nav class="wd_single_index_menu btc_main_menu">
                            @include('layouts.navbar')
                        </nav>
                        <div class="login-btn">
                            <a href="{{ route('login') }}" class="btn1"><i class="fa fa-user"></i><span>Login</span></a>
                        </div>
                    </div>
                    <!-- mobile menu area start -->
                    <div class="rp_mobail_menu_main_wrapper visible-xs">
                        <div class="row">
                            <div class="col-xs-12">
                                <div id="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                            <g>
                                                <g>
                                                    <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#fff" />
                                                </g>
                                                <g>
                                                    <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#fff" />
                                                </g>
                                                <g>
                                                    <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#fff" />
                                                </g>
                                                <g>
                                                    <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#fff" />
                                                </g>
                                                <g>
                                                    <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>
                                </div>
                            </div>
                        </div>
                        <div id="sidebar">
                            <h1><a href="#">Bit Money</a></h1>
                            <div id="toggle_close">&times;</div>
                            <div id='cssmenu' class="wd_single_index_menu">
                               @include('layouts.navbar')
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu  End -->
                </div>
            </div>
        </div>
    </header>
    <!--Header area end here-->
    <!--Slider area start here-->
    <section class="slider-area">
        <canvas>
            <script src="{{ asset('assets/js/three.js') }}"></script>
            <script src="{{ asset('assets/js/stats.min.js') }}"></script>
            <script src="{{ asset('assets/js/Projector.js') }}"></script>
            <script src="{{ asset('assets/js/CanvasRenderer.js') }}"></script>
        </canvas>

        <div id="particles-js">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="carousel-captions caption-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="slider-content">

                                            <h2 data-animation="animated bounceInLeft">Assessment Management for all business types and industries</h2>
                                            <p>Move your career forward in a world put on pause. Evaluate your employees, students, partners, and customers with EvalNode.</p>
                                            <div class="buttons">
                                                <a href="{{ route('register') }}" class="btn1" data-animation="animated bounceInUp">Register</a>
                                                <a href="{{ route('login') }}" class="btn2" data-animation="animated bounceInUp">Login</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden-xs hidden-sm">
                                        <div class="btc_timer_section_wrapper">
                                            <img src="/svg/assessment.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-nevigation">
                        <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="next" href="#carousel-example-generic" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Slider area end here-->
    {{--@include('pages.home.currency_card')--}}
</div>