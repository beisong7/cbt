<?php
$breadcrumbs = [
    "Dashboard"=>route('staff.dashboard'),
    $organization->name=>"#",
];
?>
@section('css_plugins')
    <link href="{{ asset("organization/assets/themes/$person->theme/css/users/user-profile.css") }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/plugins/table/datatable/datatables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/plugins/table/datatable/dt-global_style.css") }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/components/custom-modal.css") }}">--}}
@endsection
@extends('organization.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="">
            <h4 class="text-center mt-3">{{ $organization->name }}</h4>
            <p class="text-center">Manage Organization</p>

            {{--@include('_shared-components._display_alert')--}}
            @include('layouts.notice')
        </div>

        <div class="row layout-spacing">

            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                <div class="education  layout-spacing">
                    <div class="widget-content widget-content-area">
                        <div class="d-flex justify-content-between">
                            <h3 class="">Organization</h3>
                            <a href="#" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                        </div>
                        <div class="text-center user-info mb-5">
                            <img src="{{ $organization->image }}" alt="avatar" style="width: 90px;">

                        </div>
                        <div class="timeline-alter">
                            <div class="item-timeline">
                                <div class="t-meta-date">
                                    <p class="">Name</p>
                                </div>
                                <div class="t-dot">
                                </div>
                                <div class="t-text">
                                    <p>{{ $organization->name  }}</p>
                                </div>
                            </div>
                            <div class="item-timeline">
                                <div class="t-meta-date">
                                    <p class="">Email</p>
                                </div>
                                <div class="t-dot">
                                </div>
                                <div class="t-text">
                                    <p>{{ $organization->email  }}</p>
                                </div>
                            </div>
                            <div class="item-timeline">
                                <div class="t-meta-date">
                                    <p class="">Created</p>
                                </div>
                                <div class="t-dot">
                                </div>
                                <div class="t-text">
                                    <p>{{ $organization->created_at->diffForHumans()  }}</p>
                                </div>
                            </div>
                            <div class="item-timeline">
                                <div class="t-meta-date">
                                    <p class="">Phone</p>
                                </div>
                                <div class="t-dot">
                                </div>
                                <div class="t-text">
                                    <p>{{ $organization->phone  }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="education layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Settings</h3>
                        <div class="timeline-alter">
                            <div class="item-timeline">
                                <div class="t-meta-date">
                                    <p class="">Scope</p>
                                </div>
                                <div class="t-dot">
                                </div>
                                <div class="t-text">
                                    <p>{{ $organization->public?'Public':'Private'  }}</p>
                                </div>
                            </div>
                            <div class="item-timeline">
                                <div class="t-meta-date">
                                    <p class="">Edit</p>
                                </div>
                                <div class="t-dot">
                                </div>
                                <div class="t-text">
                                    <p>
                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($organization->staffLevel > 3)
                    <div class="education layout-spacing ">
                        <div class="widget-content widget-content-area">
                            <h3 class="">
                                Invite Link

                                @if(empty($organization->inviteLink))
                                    <button type="button" class="btn btn-primary float-right" disabled="disabled" title="Generate Link First">
                                        Send Email
                                    </button>
                                @else
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                        Send Email
                                    </button>
                                @endif


                            </h3>

                            <div class="clipboard copy-txt">
                                <div class="mb-4 p-2 " style="text-overflow: ellipsis;white-space: nowrap; background: #0a0d26;border-radius: 50px; overflow: hidden; width: 100%;" >
                                    <p class="mb-0" id="myInput" style="color: #f1efee; ">{{ !empty($organization->inviteLink)?$organization->inviteLink:'Generate Link First' }}</p>
                                </div>

                                @if(!empty($organization->inviteLink))

                                    <button class="mb-1 btn btn-primary rounded bs-tooltip trycopy_btn" title="Copy Link" onclick="copyFunction()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                        <span class="trycopy">Copy Link</span>
                                    </button>

                                <!--
                                    <button class="mb-1 btn btn-dark rounded bs-tooltip" title="Copy Code">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                        Copy Code
                                    </button>
                                    -->
                                @else
                                    <button class="mb-1 btn btn-primary" disabled="disabled" title="Generate Link First">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                        Copy Link
                                    </button>
                                <!--
                                    <button class="mb-1 btn btn-dark" disabled="disabled" title="Generate Link First">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                        Copy Code
                                    </button>
                                    -->
                                @endif

                                <button class="mb-1 btn btn-info rounded bs-tooltip" onclick="document.getElementById('generate').submit()" type="submit" title="{{ !empty($organization->inviteLink)?'Renew Link':'Generate Link' }}">{{ !empty($organization->inviteLink)?'Renew Link':'Generate Link' }}</button>
                                <div class="w-100">
                                    <form action="{{ route('organization.gen.invite') }}" method="post" id="generate">
                                        @csrf
                                        <input type="hidden" name="type" value="public">
                                        <input type="hidden" name="organization_id" value="{{ $organization->uuid  }}">
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                @endif



            </div>

            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                <div class="bio layout-spacing ">
                    <div class="widget-content widget-content-area">
                        <h3 class="">Activity</h3>

                        @if($organization->current)
                            <p>{{ $organization->name }} is your current selection. All information and activity are from {{ $organization->name }}.</p>
                        @else
                            <p>
                                {{ $organization->name }} is not currently selected. Click the card below to select this organization.
                                <b>Note!</b> This will set your current information to this organization.
                            </p>
                        @endif

                        <div class="bio-skill-box">

                            <div class="row">

                                <div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
                                    <a href="{{ route('organization.set_current', $organization->uuid) }}">
                                        <div class="b-skills">
                                            <div class="text-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                <h5 class="text-center mt-3">{{ !$organization->current?'Make Selected':'Already Selected' }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="bio layout-spacing ">
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
                                @forelse($organization->staffs as $member)
                                    <tr>
                                        <td><img src="{{ $member->image }}" alt="" style="width: 50px"></td>
                                        <td>{{ $member->names }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->joined($organization->uuid) }}</td>
                                        <td class="text-center"><span class="text-success">{{ $member->active?'Active':'Inactive' }}</span></td>
                                        <td class="text-center">
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            </a>
                                            <a href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
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


@endsection

@section('custom_js')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('organization.invite.bulk', encrypt($organization->uuid)) }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Send Invitation Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="modal-text">Type the emails of the user(s) <i>{{ _('[example: johndoe@example.com,devops@example.com]') }}</i> and click send to invite them to this organization as staffs.</p>
                        <div class="form">
                            <div class="form-group">
                                <textarea name="emails" class="form-control" id="" cols="30" rows="4" placeholder="Email(s) separated by a coma (,)" required="required">{{ old('emails') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" onclick="event.preventDefault()" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" class="btn btn-primary">Send Invite</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10,
            drawCallback: function () { $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered mb-5'); }
        } );

        function copyFunction() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            if($('#myInput').text() === 'Generate Link First'){
                $('.trycopy').text('Copied');
                $('.trycopy_btn').attr('title','Copy Link');
            }else{

                var range = document.createRange();
                range.selectNode(document.getElementById("myInput"));
                window.getSelection().removeAllRanges(); // clear current selection
                window.getSelection().addRange(range); // to select text
                document.execCommand("copy");
                window.getSelection().removeAllRanges();// to deselect

                /* Alert the copied text */
                $('.trycopy').text('Copied');
                $('.trycopy_btn').attr('title','Copy Link');
            }

            setTimeout(function(){
                $('.trycopy').text('Copy');
            }, 4000);

        }
    </script>
@endsection

