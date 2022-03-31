<?php
$breadcrumbs = [
    $person->currentOrgName => route('staff.dashboard'),
    "Assessments"=>route('organization.assessments'),
    "New"=>"#",
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
                <h4 class="text-center mt-3">Create a new Assessment</h4>
                <p class="text-center">Create a new assessment within your organization</p>
            </div>
            <form action="{{ route('organization.store.assessments') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row layout-top-spacing">
                    <div class="col-md-6 col-sm-12">
                        <div class="card card-body mb-4">
                            <div class="form-row mb-4">
                                <div class="form-group col-12">
                                    <label for="inputEmail4"> Name *</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Name Assessment (Exam, Test, Quiz, Examination, etc.) one word." name="global_name" value="{{ old('global_name') }}" autofocus required="required">
                                    @error('global_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="inputEmail4"> Title *</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Assessment Title" name="title" value="{{ old('title') }}" required="required">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-row mb-4">
                                <div class="form-group col">
                                    <label for="inputEmail4"> Type *</label>
                                    <select name="type" class="form-control" required="required">
                                        <option value="private" {{ old('type')==='private'?'selected':'' }}>Private</option>
                                        <option value="public" {{ old('type')==='public'?'selected':'' }}>Public</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col">
                                    <label for="inputEmail4"> Introduction *</label>
                                    <textarea type="text" class="form-control" rows="5" id="inputEmail4" placeholder="Assessment introduction" name="introduction" required="required">{{ old('introduction') }}</textarea>
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col">
                                    <label for="inputEmail4"> Instructions *</label>
                                    <textarea type="text" class="form-control" rows="5" id="inputEmail4" placeholder="Assessment Instructions" name="instructions" required="required">{{ old('instructions') }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="card card-body mb-3">
                            <div class="form-group mb-4">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Assessment Banner <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="image">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="card card-body mb-3">
                            <p class="font-weight-bold">Assessment Mode</p>
                            <hr>

                            <div class="form-group col">
                                <p class="font-weight-bold text-gray">Timed</p>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" class="new-control-input" id="timed_value" name="timed" {{ old('timed')==='on'?'checked':'' }} onclick="handleItem('timed_value', 'timed_input')">
                                        <span class="new-control-indicator"></span>Enable Timer on this assessment
                                    </label>
                                </div>

                            </div>
                            <div class="form-row mb-4" id="timed_input" style="display: {{ old('timed')==='on'?'block':'none' }}">
                                <div class="form-group col">
                                    <label for="inputEmail4">Duration | Minutes (numbers) </label>
                                    <input type="text" onkeypress="return isNumberKey(event);" name="timed_value" class="form-control" autocomplete="off" placeholder="Duration in minutes" value="{{ old('timed_value') }}">

                                </div>
                            </div>

                            <div class="form-group col">
                                <p class="font-weight-bold text-gray">Entry</p>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" class="new-control-input" id="entry_value" name="entry" {{ old('entry')==='on'?'checked':'' }} onclick="handleItem('entry_value', 'entry_input')">
                                        <span class="new-control-indicator"></span>Enable a set time when this assessment can be accessed
                                    </label>
                                </div>

                            </div>
                            <div class="form-row mb-4" id="entry_input" style="display: {{ old('entry')==='on'?'block':'none' }}">
                                <div class="form-group col">
                                    <label for="inputEmail4">Entry Date</label>
                                    <input type="text" name="entry_value" id="entry_field" class="form-control form-control flatpickr flatpickr-input active" autocomplete="off" placeholder="Entry Date" readonly="readonly" value="{{ old('entry_value') }}">
                                </div>
                            </div>

                            <div class="form-group col">
                                <p class="font-weight-bold text-gray">Expiry</p>
                                <div class="n-chk">
                                    <label class="new-control new-checkbox checkbox-primary">
                                        <input type="checkbox" class="new-control-input" id="expiry_value" name="expiry" {{ old('expiry')==='on'?'checked':'' }} onclick="handleItem('expiry_value', 'expiry_input')">
                                        <span class="new-control-indicator"></span>Enable Expiry time on this assessment
                                    </label>
                                </div>

                            </div>
                            <div class="form-row mb-4" id="expiry_input" style="display: {{ old('expiry')==='on'?'block':'none' }}">
                                <div class="form-group col">
                                    <label for="inputEmail4">Expiration Date</label>
                                    <input type="text" name="expiry_value" id="expiry_field" class="form-control form-control flatpickr flatpickr-input active" autocomplete="off" placeholder="Expiration Date" readonly="readonly" value="{{ old('expiry_value') }}">
                                </div>
                            </div>

                        </div>

                        <div class="card card-body mb-3">
                            <p class="font-weight-bold">Assessment Settings</p>
                            <hr>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="inputEmail4"> Questions Per Candidate </label>
                                    <input type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Total questions to be answered by candidate" name="questions_allotted" value="{{ old('questions_allotted') }}" autocomplete="off">
                                </div>
                                <div class="form-group col-12">
                                    <label for="inputEmail4"> Attempts Allowed</label>
                                    <input type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Total Attempts Allowed per candidate" name="attempts_allowed" value="{{ empty(old('attempts_allowed'))?1:old('attempts_allowed') }}" >
                                </div>
                                <div class="form-group col-12">
                                    <label for="inputEmail4">* Pass Score Percentage</label>
                                    <input type="text" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Percentage score to pass question" name="pass_percent" value="{{ old('pass_percent') }}" required="required" autocomplete="off">
                                </div>
                                <div class="form-group col-12">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" class="new-control-input" name="show_score" {{ old('show_score')==='on'?'checked':'' }} >
                                            <span class="new-control-indicator"></span>Show score after assessment
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-primary">
                                            <input type="checkbox" class="new-control-input" name="allow_review" {{ old('allow_review')==='on'?'checked':'' }} >
                                            <span class="new-control-indicator"></span>Allow participants to Review assessment when completed
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card card-body mb-3">
                            <button type="submit" class="btn btn-primary mt-3">Create Assessment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>


@endsection

@section('custom_js')
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/flatpickr/flatpickr.js") }}"></script>
    <script src="{{ asset('organization/assets/themes/light/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>

    <script>
        let firstUpload = new FileUploadWithPreview('myFirstImage');


        let f1 = flatpickr(document.getElementById('expiry_field'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        let f2 = flatpickr(document.getElementById('entry_field'), {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        function handleItem(field_id, dom_id){
            let checkBox = document.getElementById(field_id);
//            let dom = document.getElementById(dom_id);
            let dom = $(`#${dom_id}`);

            if (checkBox.checked === true){
                dom.slideDown();
            } else {
                dom.slideUp();
            }
        }
    </script>
@endsection

