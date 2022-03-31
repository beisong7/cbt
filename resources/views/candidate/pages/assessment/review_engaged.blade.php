@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/plugins/dropify/dropify.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/users/account-setting.css") }}">

@endsection

@extends('candidate.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="action-btn layout-top-spacing mb-5">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                Review <u>{{ $engaged->assessment->title }}</u> assessment performance
            </p>
        </div>
        @include('layouts.notice')

        {{--content here--}}

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="general-info" class="section general-info">
                                <div class="info">
                                    <h6 class="">General Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-12 col-md-3 mt-2">
                                                    <h6 class="m-0 p-0">Duration</h6>
                                                    <p class="mb-3">{{ $engaged->assessment->duration }} Minutes</p>
                                                    <p><b>Time Used</b></p>
                                                    <p class="mb-3">{{ $engaged->timeUsed }} </p>

                                                </div>

                                                <div class="col-xl-3 col-sm-12 col-md-3 mt-2">
                                                    <h6 class="m-0 p-0">Total Questions</h6>
                                                    <p class="mb-3">{{ $engaged->questions->count() }} Questions, <i><small>answered {{ $engaged->questionsAnswered->count() }} </small></i></p>
                                                    <p class="m-0 p-0"><b>Score Summary</b></p>
                                                    <p class="mb-3">{{ $engaged->scoreSummary }} </p>

                                                </div>
                                                <div class="col-xl-3 col-sm-12 col-md-3 mt-2">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-12">
                            <div class="p-3">
                                <h5 class="m-0 p-0">Questions</h5>
                            </div>
                            <hr class="mt-0">
                        </div>

                        @foreach($engaged->questions as $item)
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <form id="about" class="section about">
                                    <div class="info">
                                        <div class="row">
                                            <div class="col-md-11 mx-auto">
                                                <h6>{{ $item->question }}</h6>
                                                <hr>
                                                <div class="row">
                                                    @foreach($item->answers as $answer)
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="card fine-card">
                                                                <div class="p-4">
                                                                    {{ $answer->answer }}
                                                                    <span class="float-right">
                                                                        @if($answer->correct)
                                                                            <span class="badge badge-primary"> Correct </span>
                                                                        @endif
                                                                        @if($answer->selected)
                                                                            @if($answer->correct)
                                                                                <span class="badge outline-badge-success"> Selected </span>
                                                                            @else
                                                                                <span class="badge badge-danger"> Selected </span>
                                                                            @endif
                                                                        @endif
                                                                    </span>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach



                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <form id="general-info" class="section general-info">
                                <div class="info">
                                    <h6 class="">Sponsor Information</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <img src="{{ $engaged->assessment->organization->image }}" alt="" class="w-100">
                                                    </div>
                                                </div>
                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="fullName">Sponsor Name</label>
                                                                    <input readonly type="text" class="form-control mb-4" id="fullName" placeholder="{{ $engaged->assessment->organization->name }}" value="{{ $engaged->assessment->organization->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profession">About Sponsor</label>
                                                            <input type="text" class="form-control mb-4" id="profession" placeholder="Information Not Available" value="Information Not Available" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@section('custom_js')
    <script src="{{ asset("candidate/assets/themes/$person->theme/plugins/dropify/dropify.min.js") }}"></script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/plugins/blockui/jquery.blockUI.min.js") }}"></script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/js/users/account-settings.js") }}"></script>

    <script>

    </script>

@endsection