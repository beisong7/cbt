<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> EvalNode | {{ empty($title)?'Home':$title }} </title>


    <meta name="description" content="Online Evaluation Platform and Learning Management System for Organizations such as schools, Test centers and Personal businesses.">
    <meta name="keywords" content="LMS, CBT, Online Test, School Test Portal, Organization Test, Personalized Test, Learning Management System">

    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('organization/assets/themes/light/img/90x90.png') }}"/>

    @include('layouts.scripts.css')


<!-- Scripts -->

</head>
<body>

    @include('layouts.loader')


    @yield('content')

    @include('layouts.scripts.js')
</body>
</html>
