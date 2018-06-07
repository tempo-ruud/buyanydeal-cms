@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" class="card" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}
        <div class="card-body">
            <h3 class="card-title">Edit Language</h3>
            @include('layouts.shared.fields.input', [
                'title' => 'Brand Name',
                'name' => 'name',
                'type' => 'text',
                'value' => $brand->name,
                'required' => 'true'
                ])
            @include('layouts.shared.fields.textarea', [
                'title' => 'Description',
                'name' => 'description',
                'ckeditor' => 'true',
                'value' => $brand->description,
                'required' => 'true'
                ])
            @include('layouts.shared.fields.input', [
                'title' => 'URL Key',
                'name' => 'slug',
                'type' => 'text',
                'value' => $brand->slug,
                'required' => 'true'
                ])
            @if(isset($brand->cover))
                <div>
                    <img src="{{ asset("storage/$brand->cover") }}" alt="" class="img-responsive"> <br />
                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.brand.remove.image', ['brand' => $brand->id, 'image' => substr($brand->cover, 10)]) }}" class="btn btn-danger btn-sm">Remove image?</a><br />
                </div>
            @endif
            @include('layouts.shared.fields.input', [
                'title' => 'Cover Image',
                'name' => 'cover',
                'type' => 'file',
                'required' => 'false'
                ])
            @if(isset($brand->logo))
                <div>
                    <img src="{{ asset("storage/$brand->logo") }}" alt="" class="img-responsive"> <br />
                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.category.remove.image', ['category' => $brand->id, 'image' => substr($brand->logo, 10)]) }}" class="btn btn-danger btn-sm">Remove image?</a><br />
                </div>
            @endif
            @include('layouts.shared.fields.input', [
                'title' => 'Logo',
                'name' => 'logo',
                'type' => 'file',
                'required' => 'false'
                ])
            @include('admin.shared.status-select', [
                'status' => $brand->status
                ])

            @include('admin.shared.meta-edit', ['meta_title' => $brand->meta_title, 'meta_description' => $brand->meta_description, 'meta_keywords' => $brand->meta_keywords])
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.brand.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Save Brand</button>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
