<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing ">
    <div class="widget widget-five">
        <div class="widget-content">

            <div class="header">
                <div class="header-body">
                    <h6>Assessment</h6>
                </div>
            </div>
            @if($person->defaultOrganization)
                <div class="w-content">
                    <div class="">
                        <p class="task-left">{{ $person->defaultOrganization->assessments->count() }}</p>
                        <p class="task-hight-priority"><a href="{{ route('organization.assessments', 'published') }}" class="font-weight-bold text-primary">Preview</a></p>
                    </div>
                </div>
            @else
                <div class="">
                    <p class="text-center mt-4 task-hight-priority font-weight-bold">No Default Organization</p>
                </div>
            @endif

        </div>
    </div>

</div>
