<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12 timer_frame">
    <div data-section="s-new" class=" p-0" data-connect="sorting">
        <div class="connect-sorting">
            <div class="task-container-header">
                <h6 class="s-heading" data-listTitle="Timer">Timer</h6>
            </div>

            <div class="connect-sorting-content" data-sortable="true">
                <div data-draggable="true" class="card img-task fine-card" style="">
                    <div class="card-body">
                        <div class="task-body">
                            <div class="task-content">
                                <div id="cd-circle">
                                    <div class="countdown">
                                        <div class="clock-count-container">
                                            <h1 class="clock-val hrs_val">00</h1>
                                        </div>
                                        <h4 class="clock-text"> Hours </h4>
                                    </div>
                                    <div class="countdown">
                                        <div class="clock-count-container">
                                            <h1 class="clock-val min_val">00</h1>
                                        </div>
                                        <h4 class="clock-text"> Mins </h4>
                                    </div>
                                    <div class="countdown">
                                        <div class="clock-count-container">
                                            <h1 class="clock-val sec_val">00</h1>
                                        </div>
                                        <h4 class="clock-text"> Sec </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div>

            <div data-draggable="true" class="card task-text-progress fine-card" style="">
                <div class="card-body ">
                    <div class="task-header mb-0">
                        <div class="">
                            <h4 class="" data-taskTitle="Introduction">Question</h4>
                        </div>
                    </div>
                    <div class="task-body">
                        <div class="task-content">
                            <p>
                                <span class="question_position font-weight-bold">0</span> of <span class="question_total font-weight-bold">0</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('candidate.pages.assessment._partials.question_frame')
