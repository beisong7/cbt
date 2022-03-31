<?php
$breadcrumbs = [
    $person->currentOrgName => route('staff.dashboard'),
    "Members"=>"#",
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
                    <div class="widget-content widget-content-area">
                        <h3 class="">Organization Members</h3>

                        <div class="table-responsive mb-4 mt-4">
                            <table id="default-ordering" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Names</th>
                                    <th>Email</th>
                                    <th>Joined</th>
                                    <th class="text-center">Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($currentOrganization))
                                    @forelse($currentOrganization->staffs as $member)
                                        <tr>
                                            <td><img src="{{ $member->image }}" alt="" style="width: 50px"></td>
                                            <td>{{ $member->names }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->joined($currentOrganization->uuid) }}</td>
                                            <td class="text-center"><span class="text-success">{{ $member->active?'Active':'Inactive' }}</span></td>
                                            <td class="text-center">
                                                <a href="#" title="Preview" class="ml-3 rounded bs-tooltip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                </a>
                                                <a href="#" title="Remove" class="ml-3 rounded bs-tooltip">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
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
                                @endif


                                </tbody>
                            </table>
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
                "sLengthMenu": "Results :  _MENU_",
            },
            "order": [[ 3, "desc" ]],
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
        } );
    </script>
@endsection

