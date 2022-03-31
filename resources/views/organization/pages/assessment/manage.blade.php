<?php
$breadcrumbs = [
    $person->currentOrgName => route('staff.dashboard'),
    "Assessments"=>route('organization.assessments', $state),
    $assessment->title => '#',
];
?>
@section('css_plugins')

    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/components/cards/card.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/users/account-setting.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/dashboard/dash_2.css") }}">

    <style>
        .blockui-growl-message {
            background-color: transparent;
        }

    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/components/custom-list-group.css") }}">
    <link href="{{ asset("organization/assets/themes/$person->theme/plugins/file-upload/file-upload-with-preview.min.css") }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset("organization/assets/themes/$person->theme/css/components/tabs-accordian/custom-tabs.css") }}">

    <link href="{{ asset("organization/assets/themes/$person->theme/plugins/sweetalerts/sweetalert.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("organization/assets/themes/$person->theme/plugins/sweetalerts/sweetalert2.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("organization/assets/themes/$person->theme/css/components/custom-modal.css") }}" rel="stylesheet" type="text/css" />





@endsection
@extends('organization.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row">
            <div class="col-md-9">
                <h4 class="text-center mt-3">Assessment Question Builder</h4>
                <p class="text-center">Manage your assessment questions and answers.</p>
                <p class="text-center">Nore: all questions and answers are randomised during assessment, irrespective of the order which they are saved.</p>
            </div>
        </div>
        <div class="">
            {{--@include('_shared-components._display_alert')--}}
            @include('layouts.notice')
        </div>

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="row">

                    @include('organization.pages.assessment._partials.questions')
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex align-self-stretch">
                        <div class="card fine-card" style="width: 100%">
                            <div class="card-body">
                                <p class="font-weight-bold">Assessment Details</p>
                                <hr>
                                <p class="side-title mb-0"><small>Title</small></p>
                                <p class="font-weight-bold text-muted">{{ $assessment->title }}</p>

                                <p class="side-title mb-0"><small>Mode</small></p>
                                <p class="font-weight-bold text-muted">{{ $assessment->mode }}</p>

                                <p class="side-title mb-0"><small>Questions Allocated</small></p>
                                <p class="font-weight-bold text-muted">{{ empty($assessment->questions_allotted)?'All Questions':$assessment->questions_allotted." questions" }}</p>

                                <p class="side-title mb-0"><small>Questions Added</small></p>
                                <p class="font-weight-bold text-muted">{{ $assessment->questions->count() }}</p>

                                <hr class="mb-0">
                                <p class="side-title mb-0"><small>Bulk Question Upload</small></p>

                                <p class="mt-3">
                                    <a href="{{ route('assessment.excel.template') }}" class="btn mb-3 btn-block btn-sm btn-primary text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg>
                                        Download Template</a>
                                    <button class="btn btn-block btn-sm btn-info text-left" onclick="showExcelTour()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                        Directions
                                    </button>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <!-- Questions Goes There -->
                    @foreach($assessment->questions->reverse() as $question)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing _{{ $question->uuid }}_item">
                            <div class="widget widget-five pt-1">
                                <div class="widget-content">
                                    <div class="header pb-3" style="border-bottom: none">
                                        <div class="header-body">
                                            <h6 style="color: #8f8f8e" class="_update_qst{{ $question->uuid }}">{{ $question->question }}</h6>
                                        </div>
                                        <div class="task-action m-3">
                                            <div class="dropdown custom-dropdown">

                                                <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                                    <button class="dropdown-item" onclick="editItem('{{ route('edit.question', $question->uuid) }}', '{{ $question->uuid }}')">Edit</button>
                                                    <button class="dropdown-item" onclick="deleteUrl('{{ route('delete.question', $question->uuid) }}', '_{{ $question->uuid }}_item')">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-content p-0">
                                        <ul class="list-group _question_{{ $question->uuid }}_answers">
                                            @foreach($question->answers as $answer)
                                                <li class="list-group-item {{ $answer->correct?"active":"" }}">
                                                    <div class="text-left">
                                                        {{ $answer->answer }}
                                                        @if($answer->correct)
                                                            <span class="float-right">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="account-settings-footer">

                <div class="as-footer-container">

                    {{--<button id="multiple-reset" class="btn btn-primary">Remove Questions </button>--}}
                    {{--<button class="btn btn-primary">Test Assessment</button>--}}
                    <div class="blockui-growl-message">
                        <i class="flaticon-double-check"></i><span class="msg_info"></span>
                    </div>
                    <button class="btn btn-dark start_publish {{ $assessment->published?'already-published':'' }}">
                        <span class="publishing" style="display: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                        </span>
                        <span class="is_published mr-2">{{ $assessment->published?'Un-Publish':'Publish' }}</span>
                        @if($assessment->published)
                            <span class="publish_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span>
                        @endif
                    </button>

                </div>

            </div>
        </div>

    </div>


@endsection

@section('custom_js')
    <!-- MODAL EDIT START -->
    <div class="modal fade" id="editElement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
                <div class="content-container" style="min-height: 100px">
                    <div class="loader loading_elem p-5 mb-5">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-secondary" style="width: 3rem; height: 3rem;" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <p class="mt-4 text-center">Loading...</p>
                    </div>
                    <div class="question-content p-3" style="display: none;">

                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary add_btn" onclick="event.preventDefault(); injectOption()" style="display: none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                        Add Option
                    </button>
                    <button class="btn" data-dismiss="modal" onclick="event.preventDefault(); resetVariables(true)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                        Discard
                    </button>
                    <button type="button" class="btn btn-primary" onclick="event.preventDefault(); handleItemUpdate()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL END -->

    <!-- MODAL TOUR END -->
    <div class="modal fade" id="excelTour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
            <div class="modal-content">
                <div class="content-container p-5" style="min-height: 100px">
                    <h4 class="text-center">Bulk Upload Guide</h4>
                    <p class="">a) Click the Download Template to download an excel template containing two questions.</p>
                    <p class="">b) Each question shows how to use multiple options. </p>
                    <p class="">c) Delete the two questions and using the same structure, input your questions.</p>
                    <h4 class="text-center mt-3">Using more than four option.</h4>
                    <p class="">If you require more than four (4) Options, be sure to add a new column beside <b>OPTION_4</b> and name it <b>OPTION_5</b>, <b>OPTION_6</b> ... and that the answer to the question carries the Column title where the answer resides  </p>
                    <h5>DO NOT ALTER THE HEADING ASIDE FROM THE OPTIONS ON YOUR EXCEL, IT WILL ONLY CAUSE AN UPLOAD FAILURE.</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal" onclick="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="15"></line><line x1="15" y1="9" x2="9" y2="15"></line></svg>
                        Close
                    </button>

                </div>
            </div>
        </div>
    </div>
    <!-- MODAL END -->

    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/blockui/jquery.blockUI.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/file-upload/file-upload-with-preview.min.js") }}"></script>
    <script src="{{ asset("organization/assets/themes/$person->theme/plugins/sweetalerts/sweetalert2.min.js") }}"></script>
    <script>
        let currentEditObject;
        let updateObject = {
            question: {
                uuid: '',
                question: ''
            },
            answers: [], //mini answer object
            deletedAnswers: null//uuid of deleted answers
        };
        let todelete = [];
        let answerUpdateObject = {
            uuid: '',
            answer: '',
            correct: null,
        };
        let validUpdate, hasAnswer = false;
        let optionCount = 0;

        function showExcelTour(){

            $("#excelTour").modal()
        }

        function validateUpdate() {
            validUpdate = true;
            if(updateObject.question.uuid === '' || updateObject.question.uuid === null){
                validUpdate = false;
            }
            if(updateObject.question.question === '' || updateObject.question.question === null){
                validUpdate = false;
            }

            if(!hasAnswer || optionCount<2){
                validUpdate = false;
            }

            if(validUpdate){
                //start update
                updateObject.deletedAnswers = todelete;
//                console.log(updateObject);
                startItemUpdate()
            }else{
                $('.callback').text('Update Error, Kindly check correct answer and multiple options.')
                setTimeout(function () {
                    $('.callback').text("")
                }, 4000)
            }
        }


        async function startItemUpdate() {
            $('.question-content').hide();
            $('.add_btn').hide();
            $('.loading_elem').show();
//            url +=`?question_id=${updateObject.question.uuid}`;

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            await $.ajax({
                type:'post',
                url: "{{ route('assessment.update.question') }}",
                data:{
                    uuid: updateObject.question.uuid,
                    payload: updateObject
                }
            }).done(function(data){
//                console.log(data);
                if(data.success){
                    rebuildQuestionDom(data.data);
                    $('#editElement').modal('hide');
                }else{
                    $('.callback').text(data.message);
                    $('.question-content').show();
                    $('.add_btn').show();
                    $('.loading_elem').hide();
                    setTimeout(function () {
                        $('.callback').text("")
                    }, 4000)

                }
            }).fail(function(data){
                console.log(data);
                $('.callback').text('failed to complete. try again later');

                $('.question-content').show();
                $('.add_btn').show();
                $('.loading_elem').hide();
                setTimeout(function () {
                    $('.callback').text("")
                }, 4000);

            });

        }

        async function resetVariables(major = false) {
            if(major){
                currentEditObject = null;
                todelete = [];
            }
            updateObject.deletedAnswers = null;
            updateObject.question.uuid = '';
            updateObject.question.question = '';
            updateObject.answers = [];
            validUpdate = false;
            hasAnswer = false;
            optionCount = 0;
            await resetAnswerVariable()
        }

        function resetAnswerVariable(){
            answerUpdateObject.uuid = '';
            answerUpdateObject.answer = '';
            answerUpdateObject.correct = null;
        }

        async function handleItemUpdate() {
            let question_id = currentEditObject.uuid;
            if(question_id !== null){
                await resetVariables(false);

                //set required variables
                updateObject.question.question = $('.edit_question_value').val();
                updateObject.question.uuid = currentEditObject.uuid;

                //loop through answers
                let answerParent = $('.answers_dom');

                await $.each(answerParent.children(), async function (a,b) {
                    optionCount++;
                    let elements= b.children;
                    let checked = elements[1].checked;
                    let val = elements[0].children[1].value;
                    let uuid = elements[0].children[0].value;

                    if(checked){
                        hasAnswer = checked;
                    }

                    updateObject.answers.push({
                        uuid: uuid,
                        answer: val,
                        correct: checked,
                    })

                });

                await validateUpdate()

            }
        }

        let firstUpload = new FileUploadWithPreview('myFirstImage');
        let published = null;

        @if($assessment->published)
                published = true;
        @else
                published = false;
        @endif
        // Publish notification after ajax call.
        $('.start_publish').on('click', function() {
            $('.publishing').show();
            $('.publish_icon').remove();

            $('.is_published').text('Publishing');
            publishAssessment(published);

        });

        let level = $('.build_answer_parent').children().length;

        function publishAssessment(req){
            //ajax call

            console.log(req);

            let key = "{{ encrypt($assessment->uuid) }}";
            let id = "{{ encrypt($person->uuid) }}";
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $.ajax({
                type:'POST',
                url:"{{ route('organization.publish.assessments') }}",
                data:{
                    id: id,
                    key: key,
                    type: req?'no':'yes'
                }
            }).done(function(data){
//                console.log(data);
                if(data['success']){
                    $('.publishing').hide();
                    let state = !published;
                    if(state){
                        $('.is_published').text('Un-Publish');
                        let svg = `<span class="publish_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></span>`;
                        $('.start_publish').append(svg);

                        $('.question_field').attr('disabled', true);
                        $('.save_btn').attr('disabled', true);
                        $('.submit_bulk').attr('disabled', true);
                        published = state;
                    }else{
                        $('.is_published').text('Publish');
                        $('.publish_icon').remove();
                        $('.question_field').attr('disabled', false);
                        $('.save_btn').attr('disabled', false);
                        $('.submit_bulk').attr('disabled', false);
                        published = state;
                    }

                    $('.msg_info').text(data['message']);
                    flashNotice('#191E3A', 3000)
                }else{
                    $('.publishing').hide();
                    $('.msg_info').text(data['message']);
                    flashNotice('#c6080c', 3000)
                }
            }).fail(function(data){
                console.log(data);
                $('.publishing').hide();
                $('.msg_info').text('Unable to publish now');
                flashNotice('#c6080c', 3000)
            });

        }

        function flashNotice(bg, sec) {
            $.blockUI({
                message: $('.blockui-growl-message'),
                fadeIn: 700,
                fadeOut: 700,
                timeout: sec, //unblock after 3 seconds
                showOverlay: false,
                centerY: false,
                css: {
                    width: '250px',
                    backgroundColor: bg,
                    top: '80px',
                    left: 'auto',
                    right: '15px',
                    border: 0,
                    opacity: .95,
                    zIndex: 1200,
                }
            });
        }

        function addAnswer() {
            level = level+1;
            let mother = $('.build_answer_parent');
            let itemclass = `children_${level}`;
            let elem = `<div class="row ${itemclass}" style="margin-bottom: 10px; display: none">
                                    <div class="col-md-7">
                                        <p><small>* Answer Option</small></p>
                                        <input type="text" name="item_answer_option[]" class="form-control" required placeholder="Answer Option" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <p><small>* Correct Answer</small></p>
                                        <select name="item_answer_is_correct[]" class="form-control" autocomplete="off">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-4">
                                        <p><small>Remove</small></p>
                                        <a href="#" onclick="event.preventDefault(); removeItem('children_'+${level})" class="btn btn-outline-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                </div>`;
//        console.log(mother);
            mother.prepend(elem);
            $(`.${itemclass}`).slideDown();
        }

        function removeItem(id) {
//        console.log($('div.children'));
            let item = $(`.${id}`);
//        console.log(item)
            item.slideUp();
            //if hidden, remove item
            item.remove()

        }

        async function deleteUrl(url, key){
            swal.queue([{
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                showLoaderOnConfirm: true,
                padding: '2em',
                preConfirm: async function() {
                    return await fetch(url,
                        {
                            method:'post',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                        })
                        .then(async function (response) {
//                            console.log(await response.json());
                            return response.json();
                        })
                        .then(async function(data) {

                            if(data.success){
                                //update remove element
                                $(`.${key}`).remove();

                                swal.insertQueueStep({
                                    type: 'success',
                                    title: 'Delete Successful.'
                                });


                            }else{
                                swal.insertQueueStep({
                                    type: 'error',
                                    title: 'Failed. Try Again'
                                })
                            }
                        })
                        .catch(function() {
                            swal.insertQueueStep({
                                type: 'error',
                                title: 'Failed. Try Again'
                            })
                        })
                }
            }]);
        }

        async function editItem(url, $key){
            let parent = $('.question-content');
            parent.children().remove();

            $('.loading_elem').show();
            $("#editElement").modal()


            await fetch(url,
                {
                    method:'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                })
                .then(async function (response) {
//                    console.log(await response.json());
                    return response.json();
                })
                .then(async function(data) {
//                    console.log(data);
                    if(data.success){
                        //update remove element

                        buildForm(data.data, parent)

                    }else{
                        modal('hide');
                    }
                })
                .catch(function() {

                })
        }

        async function buildForm(data, parent){
            await resetVariables(true);
            currentEditObject = data;


            let token = '{{ csrf_field() }}';
            await parent.append(`<div>
                           <form action="#">
                                ${token}
                                <div class="form-group">
                                    <textarea class="form-control edit_question_value" type="text" >${data.question}</textarea>
                                </div>

                                <hr>
                                <div class="answers_dom row"></div>
                                <div class="callback text-danger"></div>
                            </form>
                           </div>`);

            buildAnswer(data)
        }

        function buildAnswer(data) {
//            console.log('answers are built');

            $.each(data.answers, (pos,answer)=> {
                $('.answers_dom').append(`<div class="col-md-6 col-sm-12 mb-4 _eject_ans_${answer.uuid}"">
                    <div class="form-group mb-2">
                        <input type="hidden" name="" class="answer_id" value="${answer.uuid}">
                        <input type="text" class="form-control" name="${answer.uuid}"  value="${answer.answer}">
                    </div>
                    <input type="radio" name="item_answer_is_correct[]" class="mr-3 ml-2" ${answer.correct?'checked':''} style="-ms-transform: scale(1.8); -webkit-transform: scale(1.8); transform: scale(1.8);">
                    <span class="text-danger float-right mr-2 " style="cursor: pointer" onclick="optionEject('${answer.uuid}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></span>

                    </div>`)
            });
            $('.question-content').show();
            $('.loading_elem').hide();
            $('.add_btn').show();
        }

        function optionEject(key){
            todelete.push(key);
            console.log(updateObject);
            let item = $(`._eject_ans_${key}`);
            if(item.length > 0){
                item.remove();
            }
        }
        let injectId = 0;

        function injectOption() {
            injectId++;
            $('.answers_dom').append(`<div class="col-md-6 col-sm-12 mb-4 _eject_ans_${injectId}"">
                    <div class="form-group mb-2">
                        <input type="hidden" name="" class="answer_id" value="">
                        <input type="text" class="form-control" name=""  value="">
                    </div>
                    <input type="radio" name="item_answer_is_correct[]" class="mr-3 ml-2" style="-ms-transform: scale(1.8); -webkit-transform: scale(1.8); transform: scale(1.8);">
                    <span class="text-danger float-right mr-2 " style="cursor: pointer" onclick="optionEject('${injectId}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></span>

                    </div>`)
        }

        function rebuildQuestionDom(data) {

            console.log('UI update started');
            let status = false;
            let question = $(`._update_qst${data.uuid}`);
            if(question.length > 0){
                console.log('question update started');
                status = true;
                question.text(data.question);
            }
            if(status){
                console.log('answers update started');
                let parent = $(`._question_${data.uuid}_answers`)
                if(data.answers.length > 1){
                    parent.children().remove();
                    $.each(data.answers, function (key,answer) {
                        parent.append(`<li class="list-group-item ${answer.correct?'active':''}">
                                            <div class="text-left">${answer.answer}
                                            ${answer.correct
                                                ?`<span class="float-right">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                                  </span>`
                                                :''}
                                            </div>
                                        </li>`
                        );
                    })
                }
            }
            console.log('UI update finished');
        }

    </script>
@endsection

