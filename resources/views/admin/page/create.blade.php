@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.page.store') }}" method="post" class="card" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <h3 class="card-title">Add new Page</h3>
            <div class="form-group">
                <label for="content_heading" class="form-label">Page Title</label>
                <input id="content_heading" name="content_heading" type="text" class="form-control" value="">
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
            {{--<div class="form-group">--}}
                {{--<label for="lang" class="form-label">Language</label>--}}
                {{--<input id="lang" name="" type="text" class="form-control" value="">--}}
            {{--</div>--}}
            <div class="form-group">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control ckeditor" name="content" id="content" rows="5" placeholder="Content">{{ old('content') }}</textarea>
            </div>
            @include('admin.shared.meta')
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.page.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Add Page</button>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
