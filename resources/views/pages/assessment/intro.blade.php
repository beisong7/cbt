@extends('auth.layouts.app')

@section('page_title', $assessment->title." | Introduction")

@section('content')

    <div class="form-container outer m-3">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h4 class="mt-1">Assessment Invite</h4>
                        @auth("web")
                            <p class="mb-0">Hello {{ $person->first_name }}</p>
                        @else
                            <p class="mb-0">Hello Guest,</p>
                        @endguest


                        <div class="mt-2">
                            <p>You are about taking an assessment titled: </p>
                            <p><b>{{ $assessment->title }}</b></p>
                            <hr>
                            <div class="text-left pl-5 pr-5">
                                <p class="text-muted"><strong>Introduction</strong></p>
                                <p class="mb-4">{{ $assessment->introduction }}</p>

                                <p class="text-muted"><strong>Instruction</strong></p>
                                <p class="mb-4">{{ $assessment->instructions }}</p>

                                @if(!empty($assessment->duration))
                                    <p class="text-muted"><strong>Duration</strong></p>
                                    <p class="mb-4">{{ $assessment->duration }} Minutes</p>
                                @endif


                                <p class="text-muted"><strong>Questions</strong></p>
                                <p class="mb-4">{{ $assessment->questions_allotted }} questions</p>

                            </div>
                            <hr>
                            @auth("web")
                                <a href="{{ route('user.dashboard') }}" class="btn btn-primary">Take Assessment</a>
                                <a href="{{ route('assessment.session.ignore') }}" class="btn btn-dark">Ignore</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Log In</a>
                                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                            @endguest


                            <div class="mt-4">
                                <p>This assessment is sponsored by </p>
                                <p>
                                    <b>{{ $assessment->organization->name }}</b>
                                    <img src="{{ $assessment->organization->image }}" alt="sponsor_image" style="width: 30px">
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('custom_js')

@endsection