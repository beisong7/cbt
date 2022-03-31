<?php
$breadcrumbs = [
    $person->currentOrgName => route('staff.dashboard'),
    "Assessments"=>route('organization.assessments', $state),
    " Preview ".$assessment->title=>"#"
];
?>
@section('css_plugins')

    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/plugins/flatpickr/flatpickr.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/plugins/flatpickr/custom-flatpickr.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/forms/theme-checkbox-radio.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/forms/switches.css") }}">
    <link href="{{ asset("organization/assets/themes/$person->theme/plugins/file-upload/file-upload-with-preview.min.css") }}" rel="stylesheet" type="text/css" />

@endsection
@extends('organization.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="mt-5">
            {{--@include('_shared-components._display_alert')--}}
            @include('layouts.notice')
        </div>

        <div class="layout-spacing">
            <div class="">
                <h4 class="mt-3"> {{ $assessment->title }} Overview</h4>
                <p class="">Manage assessment and publicity</p>
            </div>
            <div class="row layout-top-spacing">
                <div class="col-md-6 col-sm-12">

                    <div class="card card-body mb-3">
                        <p class="font-weight-bold">Assessment Publicity</p>
                        <hr>
                        @if(empty($assessment->public_key))
                            <button type="button" class="btn btn-primary float-right" disabled="disabled" title="Generate Link">
                                Send Email
                            </button>
                        @else
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                Send Email
                            </button>
                        @endif
                        <br>
                        <div class="clipboard copy-txt">
                            <div class="mb-4 p-2 " style="text-overflow: ellipsis;white-space: nowrap; background: #0a0d26;border-radius: 50px; overflow: hidden; width: 100%;" >
                                <p class="mb-0" id="myInput" style="color: #f1efee; ">{{ !empty($assessment->public_key)?route('assessment.shared.link', $assessment->public_key):'Generate Link First' }}</p>
                            </div>

                            @if(!empty($assessment->public_key))

                                <button class="mb-1 btn btn-primary rounded bs-tooltip trycopy_btn" title="Copy Link" onclick="copyFunction()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    <span class="trycopy">Copy Link</span>
                                </button>
                            @else
                                <button class="mb-1 btn btn-primary" disabled="disabled" title="Generate Link First">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                                    Copy Link
                                </button>
                            @endif

                            <button class="mb-1 btn btn-info rounded bs-tooltip" onclick="document.getElementById('generate').submit()" type="submit" title="{{ !empty($assessment->public_key)?'Disable Link':'Generate Link' }}">{{ !empty($assessment->public_key)?'Disable Link':'Generate New Link' }}</button>
                            <div class="w-100">
                                <form action="{{ route('assessment.gen.public_key') }}" method="post" id="generate">
                                    @csrf
                                    <input type="hidden" name="type" value="public">
                                    <input type="hidden" name="organization_id" value="{{ $assessment->uuid  }}">
                                </form>
                            </div>


                        </div>
                    </div>

                    <div class="card card-body mb-3">
                        <p class="font-weight-bold">Assessment Mode</p>
                        <hr>

                        <div class="form-group col">
                            <p class="font-weight-bold text-gray">Timed</p>
                            <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-primary">
                                    <input type="checkbox" class="new-control-input" disabled id="timed_value" name="timed" {{ $assessment->duration!=null?'checked':'' }} onclick="handleItem('timed_value', 'timed_input')">
                                    <span class="new-control-indicator"></span>{{ $assessment->duration }} Minutes
                                </label>
                            </div>

                        </div>



                        <div class="form-group col">
                            <p class="font-weight-bold text-gray">Entry</p>
                            <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-primary">
                                    <input disabled type="checkbox" class="new-control-input" id="entry_value" name="entry" {{ !empty($assessment->active_from)?'checked':'' }} onclick="handleItem('entry_value', 'entry_input')">
                                    <span class="new-control-indicator"></span>
                                    @if(!empty($assessment->active_from))
                                        Accessed from {{ date('F d, Y : H:i', $assessment->active_from) }}
                                    @else
                                        Accessed Anytime
                                    @endif
                                </label>
                            </div>

                        </div>


                        <div class="form-group col">
                            <p class="font-weight-bold text-gray">Expiry</p>
                            <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-primary">
                                    <input type="checkbox" class="new-control-input" id="expiry_value" name="expiry" {{ !empty($assessment->expire_at)?'checked':'' }} onclick="handleItem('expiry_value', 'expiry_input')">
                                    <span class="new-control-indicator"></span>
                                    @if(!empty($assessment->expire_at))
                                        Expires from {{ date('F d, Y : H:i', $assessment->expire_at) }}
                                    @else
                                        Never Expires
                                    @endif
                                </label>
                            </div>

                        </div>
                        <div class="form-row mb-4" id="expiry_input" style="display: {{ old('expiry')==='on'?'block':'none' }}">
                            <div class="form-group col">
                                <label for="inputEmail4">Expiration Date</label>
                                <input type="text" name="expiry_value" id="expiry_field" class="form-control form-control flatpickr flatpickr-input active" autocomplete="off" placeholder="Expiration Date" readonly="readonly" value="{{ $assessment->expiry_value }}">
                            </div>
                        </div>

                    </div>

                    <div class="card card-body mb-3">
                        <p class="font-weight-bold">Assessment Settings</p>
                        <hr>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="inputEmail4"> Questions Per Candidate </label>
                                <input type="text" disabled onkeypress="return isNumberKey(event)" class="form-control" placeholder="Total questions to be answered by candidate" name="questions_allotted" value="{{ $assessment->questions_allotted }}" autocomplete="off">
                            </div>
                            <div class="form-group col-12">
                                <label for="inputEmail4"> Attempts Allowed</label>
                                <input type="text" disabled onkeypress="return isNumberKey(event)" class="form-control" placeholder="Total Attempts Allowed per candidate" name="attempts_allowed" value="{{ empty($assessment->attempts_allowed)?1:$assessment->attempts_allowed }}" >
                            </div>
                            <div class="form-group col-12">
                                <label for="inputEmail4">* Pass Score Percentage</label>
                                <input type="text" disabled onkeypress="return isNumberKey(event)" class="form-control" placeholder="Percentage score to pass question" name="pass_percent" value="{{ $assessment->pass_percent }}" required="required" autocomplete="off">
                            </div>
                            <div class="form-group col-12">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input disabled type="checkbox" class="new-control-input" name="show_score" {{ $assessment->show_score?'checked':'' }} >
                                        <span class="new-control-indicator"></span>Show score after assessment
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-12">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input disabled type="checkbox" class="new-control-input" name="allow_review" {{ $assessment->allow_review?'checked':'' }} >
                                        <span class="new-control-indicator"></span>Allow participants to Review assessment when completed
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="card card-body mb-3">
                        <p class="font-weight-bold">Assessment Banner</p>
                        <hr>
                        <img src="{{ $assessment->image }}" alt="" style="width: 100%; max-height: 300%">
                    </div>
                    <div class="card card-body mb-4">
                        <div class="form-row mb-4">
                            <div class="form-group col-12">
                                <label for="inputEmail4"> Name</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Name Assessment (Exam, Test, Quiz, Examination, etc.) one word." name="global_name" value="{{ $assessment->global_name }}" readonly>

                            </div>
                            <div class="form-group col-12">
                                <label for="inputEmail4"> Title</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Assessment Title" name="title" value="{{ $assessment->title }}" readonly>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col">
                                <label for="inputEmail4"> Type </label>
                                <select name="type" class="form-control" disabled="disabled">
                                    <option value="private" {{ $assessment->type==='private'?'selected':'' }}>Private</option>
                                    <option value="public" {{ $assessment->type==='public'?'selected':'' }}>Public</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col">
                                <label for="inputEmail4"> Introduction </label>
                                <textarea type="text" class="form-control" rows="5" id="inputEmail4" placeholder="Assessment introduction" name="introduction" readonly>{{ $assessment->introduction }}</textarea>
                            </div>
                        </div>

                        <div class="form-row mb-4">
                            <div class="form-group col">
                                <label for="inputEmail4"> Instructions </label>
                                <textarea type="text" class="form-control" rows="5" id="inputEmail4" placeholder="Assessment Instructions" name="instructions" readonly>{{ $assessment->instructions }}</textarea>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>

    </div>


@endsection

@section('custom_js')
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/flatpickr/flatpickr.js") }}"></script>
    <script src="{{ asset('organization/assets/themes/light/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
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

