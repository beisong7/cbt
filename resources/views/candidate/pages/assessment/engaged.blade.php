@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/apps/scrumboard.css") }}">
@endsection

@extends('candidate.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="action-btn layout-top-spacing mb-5">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                Assessment
            </p>
        </div>
        @include('layouts.notice')
        @include('candidate.pages.assessment._partials.engaged_assessment2')

    </div>

@endsection

@section('custom_js')
    <script src="{{ asset("candidate/assets/themes/$person->theme/js/apps/scrumboard.js") }}"></script>
    <script>

    </script>

@endsection