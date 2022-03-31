<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget widget-five">
        <div class="widget-content">

            <div class="header">
                <div class="header-body">
                    <h6>Invitations</h6>
                    <p class="meta-date">Assessment Invitations</p>
                </div>
            </div>

            <div class="w-content">
                <div class="">
                    <p class="task-left">0</p>
                    @if($person->assessmentInvites < 1)
                        <p class="task-completed"><span><a href="#" class="text-success">None</a></span></p>
                    @else
                        <p class="task-completed"><span><a href="#" class="text-success">View</a></span></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>