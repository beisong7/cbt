@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/apps/scrumboard.css") }}">
@endsection

@extends('candidate.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="action-btn layout-top-spacing mb-5">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                Assessment / {{ $assessment->title }}
            </p>
        </div>

        <div class="row scrumboard" id="cancel-row">
            <div class="col-lg-12 layout-spacing">
                <div class="task-list-section">

                    <!-- Assessment Introduction -->
                    <div data-section="s-new" class="task-list-container" data-connect="sorting">
                        <div class="connect-sorting">
                            <div class="task-container-header">
                                <h6 class="s-heading" data-listTitle="In Progress">{{ $assessment->title }}</h6>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-1">
                                        <a class="dropdown-item list-edit" href="javascript:void(0);">Edit</a>
                                        <a class="dropdown-item list-delete" href="javascript:void(0);">Delete</a>
                                        <a class="dropdown-item list-clear-all" href="javascript:void(0);">Clear All</a>
                                    </div>
                                </div>
                            </div>



                            <div class="connect-sorting-content" data-sortable="true">

                                <div data-draggable="true" class="card img-task" style="">
                                    <div class="card-body">

                                        <div class="task-content scrumboard-nopads">
                                            <img src="{{ $assessment->image }}" class="img-fluid" alt="scrumboard">
                                        </div>

                                        <div class="task-header">
                                            <div class="">
                                                <h4 class="" data-taskTitle="{{ ucfirst($assessment->mode) }} {{ $assessment->globalTitle }}">{{ ucfirst($assessment->mode) }} {{ $assessment->globalTitle }}</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div data-draggable="true" class="card task-text-progress" style="">
                                    <div class="card-body">

                                        <div class="task-header">

                                            <div class="">
                                                <h4 class="" data-taskTitle="Introduction">Introduction</h4>
                                            </div>

                                        </div>

                                        <div class="task-body">

                                            <div class="task-content">
                                                <p class="" data-tasktext="{{ $assessment->introduction }}">{{ $assessment->introduction }}</p>
                                            </div>

                                            <div class="task-bottom">
                                                <div class="tb-section-1">
                                                    <span data-taskDate="08 Aug 2019"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> 08 Aug, 2019</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Assessment Instruction -->
                    <div data-section="s-new" class="task-list-container" data-connect="sorting">
                        <div class="connect-sorting">
                            <div class="task-container-header">
                                <h6 class="s-heading" data-listTitle="Instructions">Instructions</h6>
                            </div>

                            <div class="connect-sorting-content" data-sortable="true">

                                <div data-draggable="true" class="card img-task" style="">
                                    <div class="card-body">
                                        <div class="task-body">

                                            <div class="task-content">
                                                <p class="">{{ $assessment->instructions }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                @if($assessment->isTimed)
                                    <div data-draggable="true" class="card task-text-progress" style="">
                                        <div class="card-body">
                                            <div class="task-header mb-0">
                                                <div class="">
                                                    <h4 class="" data-taskTitle="Introduction">Duration</h4>
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
                                    <div data-draggable="true" class="card task-text-progress" style="">
                                        <div class="card-body">
                                            <div class="task-header mb-0">
                                                <div class="">
                                                    <h4 class="" data-taskTitle="Introduction">Opened From</h4>
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
                                    <div data-draggable="true" class="card task-text-progress" style="">
                                        <div class="card-body">
                                            <div class="task-header mb-0">
                                                <div class="">
                                                    <h4 class="" data-taskTitle="Introduction">Deadline</h4>
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
                                <a class="addTask" href="{{ route('candidate.take.assessments', ['id'=>encrypt($person->uuid),'key'=>encrypt($assessment->uuid)]) }}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    Take {{ $assessment->globalTitle }}
                                </a>
                            </div>

                            @if(!empty(session('assessment_invite')))
                                <div class="add-s-task mt-4">
                                    <a class="addTask" href="{{ route('assessment.session.ignore') }}">Ignore {{ $assessment->globalTitle }}</a>
                                </div>
                            @endif

                        </div>
                    </div>

                    <!-- Organization / Sponsor -->
                    <div data-section="s-new" class="task-list-container" data-connect="sorting">
                        <div class="connect-sorting">
                            <div class="task-container-header">
                                <h6 class="s-heading" data-listTitle="Instructions">{{ $assessment->globalTitle }} Sponsor</h6>
                            </div>

                            <div class="connect-sorting-content" data-sortable="true">

                                <div data-draggable="true" class="card img-task" style="">
                                    <div class="card-body">

                                        <div class="task-content scrumboard-nopads img-middle">
                                            <img src="{{ $assessment->organization->image }}" class="img-fluid" alt="scrumboard">
                                        </div>

                                        <div class="task-header">
                                            <div class="text-center">
                                                <h4 class="text-center" data-taskTitle="{{ ucfirst($assessment->organization->title) }}">{{ ucfirst($assessment->organization->name) }} </h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            @if($assessment->organization->type==='public')
                                <div class="add-s-task">
                                    <a class="addTask" href="#" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        Request To Join
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection

@section('custom_js')
    <script src="{{ asset("candidate/assets/themes/$person->theme/js/apps/scrumboard.js") }}"></script>
    <script>

    </script>

@endsection
