@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.category.update', $category->id) }}" method="post" class="card" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="card-body">
            <h3 class="card-title">Edit Language</h3>
            <div class="form-group">
                <label for="name" class="form-label">Category Name</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ $category->name ?: old('content_heading') }}">
            </div>
            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input id="slug" name="slug" type="text" class="form-control" value="{{ $category->slug ?: old('slug') }}">
            </div>
            @include('admin.shared.status-select', ['status' => $category->is_active])
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control ckeditor" name="content" id="content" rows="5" placeholder="Content">{{ $category->content ?: old('content') }}</textarea>
            </div>
            @if(isset($category->image_src))
                <div>
                    <img src="{{ asset("storage/$category->image_src") }}" alt="" class="img-responsive"> <br />
                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.category.remove.image', ['category' => $category->id, 'image' => substr($category->image_src, 10)]) }}" class="btn btn-danger btn-sm">Remove image?</a><br />
                </div>
            @endif
            <div class="form-group">
                <label for="image_src">Image</label>
                <input type="file" name="image_src" id="image_src" class="form-control">
            </div>
            @if(isset($category->thumbnail_src))
                <div>
                    <img src="{{ asset("storage/$category->thumbnail_src") }}" alt="" class="img-responsive"> <br />
                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.category.remove.image', ['category' => $category->id, 'image' => substr($category->thumbnail_src, 10)]) }}" class="btn btn-danger btn-sm">Remove image?</a><br />
                </div>
            @endif
            <div class="form-group">
                <label for="thumbnail_src" class="form-label">Thumbnail</label>
                <input id="thumbnail_src" name="thumbnail_src" type="file" class="form-control" value="">
            </div>
            @if(isset($category->icon_src))
                <div>
                    <img src="{{ asset("storage/$category->icon_src") }}" alt="" class="img-responsive"> <br />
                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.category.remove.image', ['category' => $category->id, 'image' => substr($category->icon_src, 10)]) }}" class="btn btn-danger btn-sm">Remove image?</a><br />
                </div>
            @endif
            <div class="form-group">
                <label for="icon_src" class="form-label">Icon</label>
                <input id="icon_src" name="icon_src" type="file" class="form-control" value="">
            </div>
            @include('admin.shared.meta-edit', ['meta_title' => $category->meta_title, 'meta_description' => $category->meta_description, 'meta_keywords' => $category->meta_keywords])
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.category.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Save Category</button>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
