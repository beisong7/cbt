{{-- BEGIN BREADCRUMB --}}
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-nav flex-row">
            <li>
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @if(!empty($breadcrumbs))
                            <?php $pos = 0; $len = count($breadcrumbs) ?>
                            @foreach($breadcrumbs as $key=>$val)
                                    <?php $pos++; ?>
                                @if($pos === $len)
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ $val }}">{{ $key }}</a></li>
                                @else
                                    <li class="breadcrumb-item"><a href="{{ $val }}">{{ $key }}</a></li>
                                @endif

                            @endforeach
                        @else
                            <li class="breadcrumb-item "><span>Dashboard</span></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>{{ $person->first_name }}</span></li>
                        @endif
                    </ol>
                </nav>
            </li>
        </ul>

        <div class="" style="position: absolute; right: 0; padding-right: 20px;">
            {!! !empty($currentOrganization)?" <b>$currentOrganization->name</b> <img src='$currentOrganization->image' alt='logo' class='mini-image'> ":"<a href='".route('staff.dashboard')."'>Select Organization</a>" !!}
        </div>

    </header>
</div>
{{-- END OF BREADCRUMB --}}
