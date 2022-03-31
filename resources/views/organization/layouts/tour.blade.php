<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', config('app.name'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('organization/assets/themes/light/img/90x90.png') }}"/>

    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset("organization/assets/themes/$person->theme/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("organization/assets/themes/$person->theme/css/plugins.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("organization/assets/themes/$person->theme/css/pages/coming-soon/style.css") }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <link href="{{ asset("assets/css/app_style.css") }}" rel="stylesheet" type="text/css" />

    @yield('css_plugins')
    {{-- END GLOBAL MANDATORY STYLES --}}

    {{-- BEGIN PAGE LEVEL CUSTOM STYLES --}}
    <style>
        .layout-px-spacing {
            min-height: calc(100vh - 166px)!important;
        }
    </style>

    @yield('custom_css')
    {{-- END PAGE LEVEL CUSTOM STYLES --}}

</head>
<body class="coming-soon">

    <div class="coming-soon-container">
        @yield('content')
    </div>

    <script src="{{ asset("organization/assets/themes/$person->theme/js/libs/jquery-3.1.1.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/bootstrap/js/popper.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/bootstrap/js/bootstrap.min.js") }}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    {{--<script src="{{ asset("organization/assets/themes/$person->theme/js/pages/coming-soon/coming-soon.js") }}"></script>--}}

    @yield('js_plugins')

    @yield('custom_js')

</body>
</html>