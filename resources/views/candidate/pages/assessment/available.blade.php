@section('css_plugins')
    <link rel="stylesheet" type="text/css" href="{{ asset("candidate/assets/themes/$person->theme/css/apps/scrumboard.css") }}">
@endsection

@extends('candidate.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="action-btn layout-top-spacing mb-5">
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                Assessment
            </p>
        </div>

        <div class="row scrumboard" id="cancel-row">
            <div class="col-lg-12 layout-spacing">

                <div class="task-list-section">

                    @foreach($assessments as $assessment)
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
                                                <img src="{{ $assessment->image }}" class="img-fluid" alt="scrumboard" >
                                            </div>

                                            <div class="task-header">
                                                <div class="">
                                                    <h4 class="" data-taskTitle="{{ ucfirst($assessment->mode) }}">{{ ucfirst($assessment->mode) }}</h4>
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

                                <div class="add-s-task">
                                    <a class="addTask" href="{{ route('candidate.preview.assessments', encrypt($assessment->uuid)) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        View Assessment
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach

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
