@if (session('status'))
    <div class="alert alert-success " >
        {{ session('status') }}
    </div>

@endif

@if(session('message'))

    <div class="alert alert-info " >
        {!! session('message') !!}
        <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
    </div>

@endif

@if(count($errors) > 0)

    <div >
        <ul class="list-unstyled">
            @if(count($errors)>1)
                @foreach($errors->all() as $key=>$error)
                    <li class="alert alert-danger " >
                        <i class="fa fa-warning" style="margin: 0px 9px"></i> {{ ucfirst($key) . " : ". $error }}
                        <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
                    </li>
                @endforeach
            @else
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger " >
                        <i class="fa fa-warning" style="margin: 0px 9px"></i> {{ $error }}
                        <a href="#" class="close pull-right" data-dismiss="alert" aria-label="close">&times;</a>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>

@endif