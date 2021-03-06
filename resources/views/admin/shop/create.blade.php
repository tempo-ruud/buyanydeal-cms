@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.shop.store') }}" method="post" class="card" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <h3 class="card-title">Add new Page</h3>
            @include('layouts.shared.fields.input', [
                'title' => 'Shop Name',
                'name' => 'name',
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
                'title' => 'Shop URL',
                'name' => 'url',
                'type' => 'text',
                'required' => 'true'
                ])
            @include('layouts.shared.fields.input', [
                'title' => 'URL Key',
                'name' => 'slug',
                'type' => 'text',
                'required' => 'true'
                ])
            @include('layouts.shared.fields.input', [
                'title' => 'Logo',
                'name' => 'logo',
                'type' => 'file',
                'required' => 'false'
                ])
            @include('layouts.shared.fields.meta')

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
                <a href="{{ route('admin.shop.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Add Shop</button>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
