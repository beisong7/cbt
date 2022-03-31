<?php
$breadcrumbs = [
    "Dashboard"=>route('staff.dashboard'),
    ucfirst($person->first_name)=>"#",
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
            <h4 class="text-center mt-3">{{ ucfirst($person->first_name) }} Requests</h4>
            <p class="text-center">Requests to Organizations</p>

            {{--@include('_shared-components._display_alert')--}}
            @include('layouts.notice')
        </div>

        <div class="row layout-spacing">
            @foreach($tenders as $tender)
                @if(!empty($tender->organization))
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="card component-card_1 fine-card">
                            <div class="card-body">
                                <div class="icon-svg ">
                                    <img src="{{ $tender->organization->image }}" alt="" class="img-logo">
                                </div>
                                <h5 class="card-title">{{ $tender->organization->name }}</h5>
                                @if($tender->confirm)
                                    <p class="card-text">You requested to join {{ $tender->organization->name }} {{ $tender->updated_at->diffForHumans() }}. Their Admin will attend to your request.</p>
                                    <p class="card-text">{{ $tender->organization->email }}</p>
                                @else
                                    <p class="card-text">Do you wish to join {{ $tender->organization->name }}?</p>
                                    <div class="btn-group d-flex" role="group" aria-label="Basic example">
                                        <a href="{{ route('request.accept.invite', [$tender->uuid, encrypt($tender->user->uuid)]) }}" type="button" class="btn btn-outline-primary"><b>Yes</b></a>
                                        <a href="{{ route('request.reject.invite', [$tender->uuid, encrypt($tender->user->uuid)]) }}" type="button" class="btn btn-outline-primary"><b>No</b></a>
                                    </div>
                                @endif
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

