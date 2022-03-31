@extends('layouts.main')

@section('content')
    @include('pages.home.new_top')
    @include('pages.home.about')
    @include('pages.home.features')
    @include('pages.home.steps')
    @include('pages.home.pricing')
    @include('pages.home.news')

    {{--@include('pages.home.faq')--}}

    {{--@include('pages.home.pricing')--}}
{{--    @include('pages.home.pricing_new')--}}

    {{--@include('pages.home.review')--}}

{{--    @include('pages.home.sign_up_bottom')--}}


@endsection