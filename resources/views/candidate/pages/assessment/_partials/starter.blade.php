<div class="mt-5 row test-frame d-flex justify-content-center">
    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 instruction">
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
                    <a class="addTask" onclick="event.preventDefault(); start('{{ encrypt($assessment->uuid) }}', '{{ encrypt($person->uuid) }}')" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        Start {{ $assessment->globalTitle }}
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>