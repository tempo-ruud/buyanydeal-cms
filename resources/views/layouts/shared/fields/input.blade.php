<div class="form-group">
    @if(isset($title))
        <label for="{{$name}}">{{$title}}</label>
    @endif
    <input type="{{$type}}" class="form-control" id="{{$name}}" name="{{$name}}" value="{{$value or ''}}" @if($required == 'true') required @endif>
    @if(isset($help))
        <p class="form-text text-muted">{{$help}}</p>
    @endif
</div>
