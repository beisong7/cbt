<?php
$breadcrumbs = [
    $person->currentOrgName => route('staff.dashboard'),
    "Dashboard"=>"#"
];
?>

@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/plugins/table/datatable/datatables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/dashboard/dash_2.css") }}">
@endsection
@extends('organization.layouts.app')

@section('content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        @include('organization.pages.dashboard.card_organization')
        @include('organization.pages.dashboard.card_assessment')
    </div>

</div>

@endsection