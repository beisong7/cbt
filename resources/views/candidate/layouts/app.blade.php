<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', config('app.name'))</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('candidate/assets/themes/light/img/90x90.png') }}"/>

    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset("candidate/assets/themes/$person->theme/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("candidate/assets/themes/$person->theme/css/plugins.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("candidate/assets/themes/$person->theme/css/shared.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("candidate/assets/themes/light/css/shared_theme.css") }}" rel="stylesheet" type="text/css" />
    @yield('css_plugins')
    {{-- END GLOBAL MANDATORY STYLES --}}

    {{-- BEGIN PAGE LEVEL CUSTOM STYLES --}}

    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 184px)!important;
        }

    </style>

    @yield('custom_css')
    {{-- END PAGE LEVEL CUSTOM STYLES --}}

</head>
<body class=" =alt-menu sidebar-noneoverflow">

    @include('candidate/layouts/partials/_top_bar')


    {{-- BEGIN MAIN CONTAINER --}}
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('candidate/layouts/partials/_top_nav')

        {{-- BEGIN CONTENT AREA  --}}
        <div id="content" class="main-content">

            @yield('content')

            @include('candidate.layouts.partials._footer')
        </div>
        {{-- END CONTENT AREA --}}

    </div>
    {{-- END MAIN CONTAINER --}}

    {{-- BEGIN GLOBAL MANDATORY SCRIPTS --}}
    <script src="{{ asset("candidate/assets/themes/$person->theme/js/libs/jquery-3.1.1.min.js") }}"></script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/plugins/bootstrap/js/popper.min.js") }}"></script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/js/app.js") }}"></script>
    @yield('js_plugins')
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset("candidate/assets/themes/$person->theme/js/custom.js") }}"></script>
    {{-- END GLOBAL MANDATORY SCRIPTS --}}

    {{-- BEGIN PAGE LEVEL SCRIPTS --}}
    @yield('custom_js')
    {{-- END PAGE LEVEL SCRIPTS --}}
</body>
</html>