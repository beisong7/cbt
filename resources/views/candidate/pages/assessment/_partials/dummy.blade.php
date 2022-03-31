<div class="mt-5 row test-frame ">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 instruction">
        <div data-section="s-new" class="task-list-container" data-connect="sorting">
            <div class="connect-sorting">
                <div class="task-container-header">
                    <h6 class="s-heading" data-listTitle="Instructions">Instructions</h6>
                </div>

                <div class="connect-sorting-content" data-sortable="true">

                    <div data-draggable="true" class="card img-task fine-card" style="">
                        <div class="card-body m-0 p-2 pb-0">
                            <div class="task-body">

                                <div class="task-content">
                                    <p class="">{{ $assessment->introduction }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    @if($assessment->isTimed)
                        <div data-draggable="true" class="card task-text-progress fine-card" style="">
                            <div class="card-body m-0 p-2 pb-0">
                                <div class="task-header mb-0">
                                    <div class="">
                                        <h6 class="font-weight-bold" data-taskTitle="Introduction">Duration</h6>
                                    </div>
                                </div>
                                <div class="task-body">
                                    <div class="task-content">
                                        <p class="" data-tasktext="{{ $assessment->duration }} Minutes">{{ $assessment->duration }} Minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($assessment->hasEntry)
                        <div data-draggable="true" class="card task-text-progress fine-card" style="">
                            <div class="card-body m-0 p-2 pb-0">
                                <div class="task-header mb-0">
                                    <div class="">
                                        <h6 class="font-weight-bold" data-taskTitle="Introduction">Opened From</h6>
                                    </div>
                                </div>
                                <div class="task-body">
                                    <div class="task-bottom">
                                        <div class="tb-section-1">
                                            <span data-taskDate="{{ $assessment->entryTime }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $assessment->entryTime }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($assessment->hasExpiry)
                        <div data-draggable="true" class="card task-text-progress fine-card" style="">
                            <div class="card-body m-0 p-2 pb-0">
                                <div class="task-header">
                                    <div class="">
                                        <h6 class="font-weight-bold" data-taskTitle="Deadline">Deadline</h6>
                                    </div>
                                </div>
                                <div class="task-body">
                                    <div class="task-bottom">
                                        <div class="tb-section-1">
                                            <span data-taskDate="{{ $assessment->expiryTime }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $assessment->expiryTime }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="add-s-task">
                    <a class="addTask" onclick="event.preventDefault(); start{{ $assessment->globalTitle }}('{{ encrypt($assessment->uuid) }}', '{{ encrypt($person->uuid) }}')" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        Start {{ $assessment->globalTitle }}
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 instruction">
        <div data-section="s-new" class="task-list-container" data-connect="sorting">
            <div class="connect-sorting">
                <div class="task-container-header">
                    <h6 class="s-heading" data-listTitle="Instructions">Instructions</h6>
                </div>

                <div class="connect-sorting-content" data-sortable="true">

                    <div data-draggable="true" class="card img-task fine-card" style="">
                        <div class="card-body m-0 p-2 pb-0">
                            <div class="task-body">

                                <div class="task-content">
                                    <p class="">{{ $assessment->introduction }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    @if($assessment->isTimed)
                        <div data-draggable="true" class="card task-text-progress fine-card" style="">
                            <div class="card-body m-0 p-2 pb-0">
                                <div class="task-header mb-0">
                                    <div class="">
                                        <h6 class="font-weight-bold" data-taskTitle="Introduction">Duration</h6>
                                    </div>
                                </div>
                                <div class="task-body">
                                    <div class="task-content">
                                        <p class="" data-tasktext="{{ $assessment->duration }} Minutes">{{ $assessment->duration }} Minutes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($assessment->hasEntry)
                        <div data-draggable="true" class="card task-text-progress fine-card" style="">
                            <div class="card-body m-0 p-2 pb-0">
                                <div class="task-header mb-0">
                                    <div class="">
                                        <h6 class="font-weight-bold" data-taskTitle="Introduction">Opened From</h6>
                                    </div>
                                </div>
                                <div class="task-body">
                                    <div class="task-bottom">
                                        <div class="tb-section-1">
                                            <span data-taskDate="{{ $assessment->entryTime }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $assessment->entryTime }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($assessment->hasExpiry)
                        <div data-draggable="true" class="card task-text-progress fine-card" style="">
                            <div class="card-body m-0 p-2 pb-0">
                                <div class="task-header">
                                    <div class="">
                                        <h6 class="font-weight-bold" data-taskTitle="Deadline">Deadline</h6>
                                    </div>
                                </div>
                                <div class="task-body">
                                    <div class="task-bottom">
                                        <div class="tb-section-1">
                                            <span data-taskDate="{{ $assessment->expiryTime }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $assessment->expiryTime }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="add-s-task">
                    <a class="addTask" onclick="event.preventDefault(); start{{ $assessment->globalTitle }}('{{ encrypt($assessment->uuid) }}', '{{ encrypt($person->uuid) }}')" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        Start {{ $assessment->globalTitle }}
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@foreach($assessment->questions as $key=>$question)

    <div class="col-12 show_{{ $key }}" style="display: {{ $key===0?'block':'none' }}">
        <div class="row ">
            <div class="connect-sorting-content col-12" data-sortable="true">
                <div data-draggable="true" class="card task-text-progress fine-card" style="">
                    <div class="card-body ">
                        <p class="font-weight-bold text-thick ">{{ $question->question }}</p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div data-draggable="true" class="card task-text-progress fine-card" style="">
                    <div class="card-body ">
                        <div class="row">
                            @foreach($question->answers as $answer)



                                <div class="col-md-6 col-sm-12">
                                    <div class="n-chk">
                                        <label class="new-control new-radio radio-primary">
                                            <input type="radio" name="{{ $question->uuid }}" value="{{ $answer->uuid }}" class="new-control-input">
                                            <span class="new-control-indicator"></span>
                                            <span class="text-thick  font-weight-bold">{{ $answer->answer }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="connect-sorting-content col-12" data-sortable="true">
                <div data-draggable="true" class="card task-text-progress fine-card" style="">
                    <div class="card-body ">
                        <a href="#" class="btn btn-dark btn_prev" onclick="event.preventDefault(); prevQuestion('{{ $key }}', '{{ $assessment->questions->count() }}')" style="display: none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            Previous
                        </a>

                        <a href="#" class="btn btn-primary btn_next float-right" onclick="event.preventDefault(); nextQuestion('{{ $key }}', '{{ $assessment->questions->count() }}')">
                            Next
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </a>

                        <a href="#" onclick="event.preventDefault()" class="btn btn-info float-right btn_submit" style="display: {{ $question->count() !== 1?'none':'block' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Complete
                        </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endforeach