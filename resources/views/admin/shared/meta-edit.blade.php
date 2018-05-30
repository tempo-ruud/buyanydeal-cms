<div class="form-group">
    <label for="meta_title" class="form-label">Meta Title</label>
    <input id="meta_title" name="meta_title" type="text" class="form-control" value="{{ $meta_title ?: old('meta_title') }}">
</div>
<div class="form-group">
    <label for="meta_description" class="form-label">Meta Description</label>
    <textarea class="form-control" name="meta_description" id="meta_description" rows="5" placeholder="Meta Description">{{ $meta_description ?: old('meta_description') }}</textarea>
</div>
<div class="form-group">
    <label for="meta_keywords" class="form-label">Meta Keywords</label>
    <textarea class="form-control" name="meta_keywords" id="meta_keywords" rows="5" placeholder="Content">{{ $meta_keywords ?: old('meta_keywords') }}</textarea>
</div>