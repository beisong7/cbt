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
    <link href="{{ asset("organization/assets/themes/$person->theme/css/loader.css") }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset("organization/assets/themes/$person->theme/js/loader.js") }}"></script>

    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset("organization/assets/themes/$person->theme/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("organization/assets/themes/$person->theme/css/plugins.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("organization/assets/themes/$person->theme/plugins/perfect-scrollbar/perfect-scrollbar.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("organization/assets/themes/light/css/shared.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("candidate/assets/themes/$person->theme/css/shared.css") }}" rel="stylesheet" type="text/css" />
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
<body>
    {{-- BEGIN LOADER --}}
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    {{-- END LOADER --}}

    @include('organization.layouts.partials._top_nav')

    @include('organization.layouts.partials._breadcrumb')

    {{-- BEGIN MAIN CONTAINER --}}
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('organization.layouts.partials._side_nav')

        {{-- BEGIN CONTENT PART  --}}
        <div id="content" class="main-content">

            @yield('content')

            @include('organization.layouts.partials._footer')

        </div>
    </div>

    {{-- BEGIN GLOBAL MANDATORY SCRIPTS --}}
    <script src="{{ asset("organization/assets/themes/$person->theme/js/libs/jquery-3.1.1.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/bootstrap/js/popper.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/perfect-scrollbar/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/js/app.js") }}"></script>

    @yield('js_plugins')
    <script>
        $(document).ready(function() {
            App.init();
        });

        function goto(link) {
            window.location = link;
        }

        function isNumberKey(evt) {
            let k = evt.key;
            if(isNaN(k)){
//                if(k==="."){
//                    return true;
//                }
                return false;
            }else{
                if(k===" "){
                    return false;
                }
                return true;
            }
        }

    </script>
    <script src="{{ asset("organization/assets/themes/$person->theme/js/custom.js") }}"></script>
    {{-- END GLOBAL MANDATORY SCRIPTS --}}

    {{-- BEGIN PAGE LEVEL SCRIPTS --}}
    @yield('custom_js')
    {{-- END PAGE LEVEL SCRIPTS --}}
</body>
</html>