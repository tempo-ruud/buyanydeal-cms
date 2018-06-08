@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Product Information</h5>
            </div>

            <div class="card-body">
                @include('layouts.shared.fields.input', [
                    'title' => 'Product Name',
                    'name' => 'name',
                    'type' => 'text',
                    'required' => 'true'
                    ])
                @include('layouts.shared.fields.input', [
                    'title' => 'Sku',
                    'name' => 'sku',
                    'type' => 'text',
                    'required' => 'true'
                    ])
                @include('layouts.shared.fields.input', [
                    'title' => 'Ean',
                    'name' => 'sku',
                    'type' => 'text',
                    'required' => 'false'
                    ])
                @include('layouts.shared.fields.input', [
                    'title' => 'Slug',
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
                    'title' => 'Main Image',
                    'name' => 'cover',
                    'type' => 'file',
                    'required' => 'false'
                    ])
                <div class="form-group">
                    <label for="image">Images</label>
                    <input type="file" name="image[]" id="image" class="form-control" multiple>
                    <span class="text-warning">You can use ctr (cmd) to select multiple images</span>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="is_active" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-3">
                            <select id="status" name="status" class="form-control custom-select" required>
                                <option value="1">Enabled</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Select a brand</h5>
            </div>
            <div class="card-body">
                @include('admin.shared.brands', ['brands' => $brands])
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">SEO Information</h5>
            </div>
            <div class="card-body">
                @include('layouts.shared.fields.meta')
            </div>
        </div>

        <div class="card">
            <div class="card-body text-right">
                <div class="d-flex">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-auto">Save Product</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
