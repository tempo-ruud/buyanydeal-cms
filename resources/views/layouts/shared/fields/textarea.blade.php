<div class="form-group">
    @if(isset($title))
        <label for="{{$name}}">{{$title}}</label>
    @endif
    <textarea class="form-control @if($ckeditor == 'true') ckeditor @endif" name="{{$name}}" id="{{$name}}" rows="5" @if($required == 'true') required @endif>{{$value or ''}}</textarea>
    @if(isset($help))
        <p class="form-text text-muted">{{$help}}</p>
    @endif
</div>
