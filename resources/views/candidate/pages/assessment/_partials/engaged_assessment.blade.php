<div class="row scrumboard" id="cancel-row">
    <div class="col-lg-12 layout-spacing">

        <div class="task-list-section">

            @foreach($engages as $engage)
                <div data-section="s-new" class="task-list-container" data-connect="sorting">
                    <div class="connect-sorting">
                        <div class="task-container-header">
                            <h6 class="s-heading" data-listTitle="In Progress">{{ $engage->assessment->title }}</h6>
                        </div>



                        <div class="connect-sorting-content" data-sortable="true">

                            <div data-draggable="true" class="card img-task" style="">
                                <div class="card-body">

                                    <div class="task-content scrumboard-nopads">
                                        <img src="{{ $engage->assessment->image }}" class="img-fluid" alt="scrumboard" >
                                    </div>

                                    <div class="task-header">
                                        <div class="">
                                            <h4 class="" data-taskTitle="In Progress">{{ $engage->completed?"Completed":"In Progress" }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div data-draggable="true" class="card task-text-progress" style="">
                                <div class="card-body">

                                    <div class="task-header">

                                        <div class="">
                                            <h4 class="" data-taskTitle="">{{ $engage->completed?'Percentage Score':'Percentage Completed' }}</h4>
                                        </div>

                                    </div>

                                    <div class="task-body">

                                        <div class="task-content">

                                            <div class="">
                                                @if($engage->assessment->show_score && $engage->completed)
                                                    <div class="progress br-30">
                                                        <div class="progress-bar {{ $engage->passed?'bg-success':'bg-danger' }}" role="progressbar" data-progressState="{{  $engage->score }}" style="width: {{  $engage->score }}%" aria-valuenow="{{  $engage->score }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>

                                                    <p class="progress-count">{{ $engage->score }}%</p>
                                                @else
                                                    @if($engage->completed)
                                                        <div class="row">
                                                            <p>Score disabled by sponsor</p>
                                                        </div>
                                                    @else
                                                        <div class="progress br-30">
                                                            <div class="progress-bar bg-primary" role="progressbar" data-progressState="0" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>

                                                        <p class="progress-count">0%</p>
                                                    @endif
                                                @endif

                                            </div>
                                        </div>

                                        <div class="task-bottom">
                                            <div class="tb-section-1">
                                                        <span data-taskDate="08 Aug 2019"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                                            {{ date('M d, Y', $engage->last_update) }}
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-s-task">
                            @if($engage->completed)
                                <a class="addTask" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    Review
                                </a>
                            @else
                                <a class="addTask" href="{{ route('candidate.preview.assessments', encrypt($engage->assessment->uuid)) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    Continue Assessment
                                </a>
                            @endif

                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>