@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.category.store') }}" method="post" class="card" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <h3 class="card-title">Add new Page</h3>
            <div class="form-group">
                <label for="name" class="form-label">Category Name</label>
                <input id="name" name="name" type="text" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="parent_id">Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-control select2">
                    <option value="">No Parent</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input id="slug" name="slug" type="text" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="is_active" class="form-label">Status</label>
                <select id="is_active" name="is_active" class="form-control custom-select">
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                </select>
            </div>
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control ckeditor" name="content" id="content" rows="5" placeholder="Content">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image_src" class="form-label">Image</label>
                <input id="image_src" name="image_src" type="file" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="thumbnail_src" class="form-label">Thumbnail</label>
                <input id="thumbnail_src" name="thumbnail_src" type="file" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="icon_src" class="form-label">Icon</label>
                <input id="icon_src" name="icon_src" type="file" class="form-control" value="">
            </div>
            @include('admin.shared.meta')
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.category.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Add Category</button>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
