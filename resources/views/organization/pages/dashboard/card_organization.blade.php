<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
    <div class="widget widget-five">
        <div class="widget-content">

            <div class="header">
                <div class="header-body">
                    <h6>Organizations</h6>
                </div>
            </div>

            <div class="w-content">
                <div class="">
                    <p class="task-left">{{ $person->organization->count() }}</p>
                    @if($person->organization->count() > 0)
                        <p class="task-hight-priority"><span>{{ $person->currentOrgName===$person->first_name?"None":$person->currentOrgName  }}</span> Set to Default </p>
                    @else
                        <p class="task-hight-priority"><a href="{{ route('new.organization') }}" class="btn btn-small btn-primary">Create New</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>