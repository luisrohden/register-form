@if(Session::has('form-errors'))
    <div class="form-errors">
        @foreach(Session::get('form-errors') as $msg)
        <div class="msg">
            {{$msg}}
        </div>
        @endforeach
    </div>
@endif
