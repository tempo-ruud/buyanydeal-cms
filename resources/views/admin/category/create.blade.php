@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

{{--    @php(dd($categories))--}}
    <form action="{{ route('admin.category.store') }}" method="post" class="card" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <h3 class="card-title">Add new Page</h3>
            @include('layouts.shared.fields.input', [
                'title' => 'Category Name',
                'name' => 'name',
                'type' => 'text',
                'required' => 'true'
                ])
            <div class="form-group">
                <label for="parent_id">Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-control select2">
                    <option value="">No Parent</option>
                    @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @include('layouts.shared.fields.input', [
                'title' => 'URL',
                'name' => 'slug',
                'type' => 'text',
                'required' => 'true'
                ])
            @include('layouts.shared.fields.textarea', [
                'title' => 'Description',
                'name' => 'description',
                'ckeditor' => 'true',
                'required' => 'false'
                ])
            @include('layouts.shared.fields.input', [
                'title' => 'Cover Image',
                'name' => 'cover',
                'type' => 'file',
                'required' => 'false'
                ])
            @include('layouts.shared.fields.input', [
                'title' => 'Thumbnail',
                'name' => 'thumbnail',
                'type' => 'file',
                'required' => 'false'
                ])
            @include('layouts.shared.fields.input', [
                'title' => 'Icon',
                'name' => 'icon',
                'type' => 'file',
                'required' => 'false'
                ])
            @include('admin.shared.meta')
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-control custom-select">
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                </select>
            </div>
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
