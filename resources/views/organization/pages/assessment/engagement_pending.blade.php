<?php
$breadcrumbs = [
    $person->currentOrgName => route('staff.dashboard'),
    "Engaged Assessments"=>route('organization.assessments.engaged'),
];
?>
@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/plugins/table/datatable/datatables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/plugins/table/datatable/dt-global_style.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/components/cards/card.css") }}">

@endsection
@extends('organization.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="mt-5">
            {{--@include('_shared-components._display_alert')--}}
            @include('layouts.notice')
        </div>

        <div class="row layout-spacing">
            <div class="col">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <h5 class="card-title">{{ $subject }} / Incomplete Assessment</h5>
                        <div class="layout-top-spacing">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="default-ordering" class="table table-hover table-striped " style="width:100%">
                                    <thead>
                                    <tr>

                                        <th title="Assessment Title" class="bs-tooltip">Title</th>
                                        <th title="Last Engaged" class="bs-tooltip">Date</th>
                                        <th title="Questions Answered" class="bs-tooltip">Questions Seen</th>
                                        <th title="Questions Answered" class="bs-tooltip">Questions Answered</th>
                                        <th title="Time taken to complete" class="bs-tooltip">Time Spent</th>
                                        <th title="Options" class="bs-tooltip">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($engaged as $engage)
                                        <tr>
                                            <td>{{ $engage->assessment->title }}</td>
                                            <td>{{ date('F d, Y', $engage->last_update) }}</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" title="View All Candidates" class="ml-3 rounded bs-tooltip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <p class="text-data">No Data Found</p>
                                            </td>
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection

@section('custom_js')
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/table/datatable/datatables.js") }}"></script>
    <script>

    </script>
@endsection

