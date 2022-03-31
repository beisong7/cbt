<div class="mt-5 row mb-5">
    @foreach($engages as $engage)
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 ">
        <div data-section="s-new" class="mb-5" data-connect="sorting">
            <div class="connect-sorting">
                <div class="task-container-header">
                    <h6 class="s-heading" >{{ $engage->assessment->title }}</h6>
                </div>

                <div class="connect-sorting-content" data-sortable="true">

                    <div data-draggable="true" class="card img-task fine-card" style="">
                        <div class="card-body m-0 p-0 pb-0 scrumcard">
                            <div class="task-content scrumboard-nopads" style="height: auto">
                                <img src="{{ $engage->assessment->image }}" class="img-fluid" alt="scrumboard" style="border-radius: 6px;">
                            </div>

                            <div class="task-header">
                                <div class="">
                                    <p class="" data-taskTitle="In Progress">{{ $engage->completed?"Completed":"In Progress" }}</p>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div data-draggable="true" class="card img-task fine-card" style="">
                        <div class="card-body m-0 p-2 pb-0 scrumcard">
                            <div class="task-body">
                                <p class="">{{ $engage->completed?'Assessment Score':'Progress' }}</p>
                                <div class="task-content">

                                    <div class="d-flex">
                                        @if($engage->assessment->show_score && $engage->completed)
                                            <div class="progress br-30 progress-bg" style="width: 90%; height: 10px; margin-top: 5px;">
                                                <div class="progress-bar {{ $engage->passed?'bg-success':'bg-danger' }}" role="progressbar" data-progressState="{{  $engage->score }}" style="width: {{  $engage->score }}%" aria-valuenow="{{  $engage->score }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            <p class="progress-count" style="float: right;padding-left: 5px;">{{ $engage->score }}%</p>
                                        @else
                                            @if($engage->completed)
                                                <div class="row">
                                                    <div class="col">
                                                        <p>Score disabled by sponsor</p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="progress br-30 progress-bg" style="width: 90%; height: 10px; margin-top: 5px;">
                                                    <div class="progress-bar bg-primary" role="progressbar" data-progressState="{{ $engage->progress }}" style="width: {{ $engage->progress }}%" aria-valuenow="{{ $engage->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>

                                                <p class="progress-count" style="float: right;padding-left: 5px;">{{ $engage->progress }}%</p>
                                            @endif
                                        @endif

                                    </div>
                                </div>

                                <div class="task-bottom">
                                    <div class="tb-section-1">
                                                        <span data-taskDate="08 Aug 2019"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                            {{ date('M d, Y | H:i', $engage->last_update) }}
                                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="add-s-task">
                    @if($engage->completed)
                        @if($engage->assessment->allow_review)
                            <a class="addTask" href="{{ route('review.engaged.assessment', encrypt($engage->uuid)) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                Review
                            </a>
                        @else
                            <a class="addTask"  disabled="disabled" title="Review disabled by sponsor">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                Review Not Allowed
                            </a>
                        @endif

                    @else
                        <a class="addTask" href="{{ route('candidate.assessments.resume', encrypt($engage->uuid)) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            Continue Assessment
                        </a>
                    @endif

                </div>



            </div>
        </div>
    </div>
    @endforeach
</div>