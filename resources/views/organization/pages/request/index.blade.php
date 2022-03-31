<?php
$breadcrumbs = [
    "Dashboard"=>route('staff.dashboard'),
    $currentOrganization->name=>"#",
    "Requests"=>"#",
];
?>
@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/components/cards/card.css") }}">
@endsection
@extends('organization.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="">
            <h4 class="text-center mt-3">{{ $currentOrganization->name }} Requests</h4>
            <p class="text-center">All Requests to join {{ $currentOrganization->name  }}</p>

            {{--@include('_shared-components._display_alert')--}}
            @include('layouts.notice')
        </div>

        <div class="row layout-spacing">
            @foreach($tenders as $tender)
                @if(!empty($tender->user))
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="card component-card_1 fine-card">
                            <div class="card-body">
                                <div class="icon-svg ">
                                    <img src="{{ $tender->user->image }}" alt="" class="img-logo">
                                </div>
                                <h5 class="card-title">{{ $tender->user->names }}</h5>
                                <p class="card-text">{{ $tender->user->names }} requested to join your Organization.</p>
                                <p class="card-text">{{ $tender->user->email }}</p>
                                <div class="btn-group d-flex" role="group" aria-label="Basic example">
                                    <a href="{{ route('organization.accept.invite', [$tender->uuid, encrypt($tender->user->uuid)]) }}" type="button" class="btn btn-outline-primary"><b>Accept</b></a>
                                    <a href="{{ route('organization.reject.invite', [$tender->uuid, encrypt($tender->user->uuid)]) }}" type="button" class="btn btn-outline-primary"><b>Reject</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach

        </div>

    </div>


@endsection

@section('custom_js')

    <script>

    </script>
@endsection

