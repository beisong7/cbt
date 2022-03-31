<div class="col-sm-12 col-md-8 col-lg-8 col-xl-9 align-self-stretch">
    <div class="row">
        <div id="tabsLine" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Question Form</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area underline-content">

                    <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="underline-home-tab" data-toggle="tab" href="#underline-home" role="tab" aria-controls="underline-home" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                Single Upload
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="underline-profile-tab" data-toggle="tab" href="#underline-profile" role="tab" aria-controls="underline-profile" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                Bulk Upload
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" id="lineTabContent-3">
                        <div class="tab-pane fade active show" id="underline-home" role="tabpanel" aria-labelledby="underline-home-tab">
                            <form action="{{ !$assessment->published?route('assessment.question.save', $assessment->uuid):'#' }}" method="POST" enctype="multipart/form-data" class="mb-5">
                                @csrf
                                <div class="form-group">
                                    <label for="fullName">Question</label>
                                    <textarea type="text" name="question" rows="3" class="form-control mb-4 question_field" {{ $assessment->published?'disabled':'' }} placeholder="Fill your Questions" required>{{ old('question') }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="profession">Answer Input Type</label>
                                            <select name="ans_input" class="form-control answer_option" autocomplete="off" >
                                                <option value="radio" {{ old('answer_option')==='radio'?'selected':'' }} selected >Single Choice</option>
                                                {{--<option value="checkbox" {{ old('answer_option')==='checkbox'?'selected':'' }}>Multi Choice</option>--}}
                                                <option value="text" {{ old('answer_option')==='text'?'selected':'' }}>Fill In Answer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 mt-4">
                                        <a href="#" onclick="event.preventDefault(); addAnswer()" class="btn btn-dark">Add Answer</a>
                                        <button type="submit" class="btn btn-primary save_btn" {{ $assessment->published?'disabled':'' }} style="margin-left: 10px">Save Question</button>
                                    </div>

                                </div>
                                <small class="text-gray">Answers</small>
                                <hr>
                                <div class="pt-3">
                                    <div class="row">
                                        <div class="col">
                                            <div class="build_answer_parent">
                                                @if(!empty(old('item_answer_option')))
                                                    @foreach(old('item_answer_option') as $key=>$answers)
                                                        <div class="row children_{{ $key+1 }}" style="margin-bottom: 10px; display: none">
                                                            <div class="col-md-7">
                                                                <p><small>* Answer Option</small></p>
                                                                <input type="text" name="item_answer_option[]" class="form-control" required placeholder="Answer Option" autocomplete="off" value="{{ $answer }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p><small>* Correct Answer</small></p>
                                                                <select name="item_answer_is_correct[]" class="form-control" autocomplete="off">
                                                                    <option value="no" {{ old('item_answer_is_correct')[$key]==='no'?'selected':'' }}>No</option>
                                                                    <option value="yes" {{ old('item_answer_is_correct')[$key]==='yes'?'selected':'' }} >Yes</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-2 col-4">
                                                                <p><small>Remove</small></p>
                                                                <a href="#" onclick="event.preventDefault(); removeItem('children_'{{ $key+1 }})" class="btn btn-outline-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                </a>
                                                            </div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="underline-profile" role="tabpanel" aria-labelledby="underline-profile-tab">

                            <form action="{{ !$assessment->published?route('assessment.question.bulk.save', $assessment->uuid):'#' }}" method="POST" enctype="multipart/form-data" class="">
                                @csrf
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Upload (Excel File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input" name="excel" required="required">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                <button type="submit" class="btn btn-primary submit_bulk " {{ $assessment->published?'disabled':'' }} style="margin-left: 10px">Upload Questions</button>
                            </form>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>