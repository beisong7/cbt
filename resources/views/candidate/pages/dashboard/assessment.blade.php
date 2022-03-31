<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget widget-five">
        <div class="widget-content">

            <div class="header">
                <div class="header-body">
                    <h6>Assessments</h6>
                    <p class="meta-date">Assessments Taken</p>
                </div>
            </div>

            <div class="w-content">
                <div class="">
                    <p class="task-left">{{ $person->assessments->count() }}</p>
                    @if($person->assessments->count() < 1)
                        <p class="task-completed"><span><a href="#" class="text-success">None</a></span></p>
                    @else
                        <p class="task-completed"><span><a href="{{ route('candidate.engaged.assessments') }}" class="text-success">View</a></span></p>
                    @endif

                    <p class="task-hight-priority"><span><a href="{{ route('candidate.available.assessments') }}" class="text-primary">Take</a></span> other assessments</p>

                </div>
            </div>
        </div>
    </div>

</div>