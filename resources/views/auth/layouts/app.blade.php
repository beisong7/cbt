<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('page_title', config('app.name'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('organization/assets/themes/light/img/90x90.png') }}"/>
    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('organization/assets/themes/light/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('organization/assets/themes/light/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('organization/assets/themes/light/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    @yield('css_plugins')
    {{-- END GLOBAL MANDATORY STYLES --}}

    {{-- BEGIN PAGE LEVEL STYLE --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('organization/assets/themes/light/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('organization/assets/themes/light/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('organization/assets/themes/light/css/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/shared.css') }}">
    <style>
        .invalid-feedback { display: block; }
    </style>
    @yield('custom_css')
    {{-- END PAGE LEVEL STYLES --}}
</head>
<body class="form">

    @yield('content')

    {{-- BEGIN GLOBAL MANDATORY SCRIPTS --}}
    <script src="{{ asset('organization/assets/themes/light/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('organization/assets/themes/light/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('organization/assets/themes/light/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    @yield('js_plugins')
    {{-- END GLOBAL MANDATORY SCRIPTS --}}

    {{-- BEGIN PAGE LEVEL SCRIPTS --}}
    <script src="{{ asset('organization/assets/themes/light/js/authentication/form-2.js') }}"></script>
    @yield('custom_js')
    {{-- END PAGE LEVEL SCRIPTS --}}

</body>
</html>