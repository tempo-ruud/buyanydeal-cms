@if($errors->all())
    @foreach($errors->all() as $message)
        <div class="alert alert-info" role="alert">
            {{ $message }}
        </div>
    @endforeach

@elseif(session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@elseif(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session()->get('error') }}
    </div>
@endif
