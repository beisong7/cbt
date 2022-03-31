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
                        <h5 class="card-title">Engaged Assessments <a href="{{ route('organization.create.assessments') }}" class="btn btn-outline-primary btn-sm float-right">New Assessment</a></h5>
                        <div class="layout-top-spacing">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="default-ordering" class="table table-hover table-striped " style="width:100%">
                                    <thead>
                                    <tr>

                                        <th title="Assessment Title" class="bs-tooltip">Title</th>
                                        <th title="Number of Attempts made" class="bs-tooltip">Attempts</th>
                                        <th title="Completed Assessments" class="bs-tooltip">Completed</th>
                                        <th title="Number of Candidates" class="bs-tooltip">Enrolled</th>
                                        <th title="Successful Candidates" class="bs-tooltip">Passed</th>
                                        <th title="Options" class="bs-tooltip">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($assessments as $assessment)
                                        <tr>
                                            <td>{{ $assessment->title }}</td>
                                            <td>{{ $assessment->attempts }}</td>
                                            <td>{{ $assessment->completed }}</td>
                                            <td>{{ $assessment->enrolledCandidates->count() }}</td>
                                            <td>{{ $assessment->successCandidate->count() }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('assessment.reveal', ['pending', $assessment->uuid]) }}" title="View Attempts" class="ml-3 rounded bs-tooltip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                                </a>

                                                <a href="{{ route('assessment.reveal', ['completed', $assessment->uuid]) }}" title="View Completed" class="ml-3 rounded bs-tooltip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg><x></x>
                                                </a>

                                                <a href="{{ route('organization.assessments.submission', $assessment->uuid) }}" title="View Successful Candidates" class="ml-3 rounded bs-tooltip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                                </a>

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
        $('#default-ordering').DataTable( {
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Showing  :  _MENU_",
            },
            "order": [[ 3, "desc" ]],
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
        } );
    </script>
@endsection

