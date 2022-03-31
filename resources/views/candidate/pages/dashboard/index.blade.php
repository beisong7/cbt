@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/dashboard/dash_2.css") }}">
@endsection

@extends('candidate.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="action-btn layout-top-spacing mb-5">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                Dashboard
            </p>
        </div>
        <div class="row layout-top-spacing">
            @include('.candidate.pages.dashboard.achievements')
            @include('.candidate.pages.dashboard.assessment')
            @include('.candidate.pages.dashboard.invites')
            <div class="col-12 mb-4">
                <hr>
            </div>
            @include('.candidate.pages.dashboard.membership')

        </div>
    </div>

@endsection