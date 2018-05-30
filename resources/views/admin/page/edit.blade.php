@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.page.update', $page->id) }}" method="post" class="card" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="card-body">
            <h3 class="card-title">Edit Language</h3>
            <div class="form-group">
                <label for="content_heading" class="form-label">Page Title</label>
                <input id="content_heading" name="content_heading" type="text" class="form-control" value="{{ $page->content_heading ?: old('content_heading') }}">
            </div>
            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input id="slug" name="slug" type="text" class="form-control" value="{{ $page->slug ?: old('slug') }}">
            </div>
            @include('admin.shared.status-select', ['status' => $page->is_active])
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control ckeditor" name="content" id="content" rows="5" placeholder="Content">{{ $page->content ?: old('content') }}</textarea>
            </div>
            @include('admin.shared.meta-edit', ['meta_title' => $page->meta_title, 'meta_description' => $page->meta_description, 'meta_keywords' => $page->meta_keywords])
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.page.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Save Page</button>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
