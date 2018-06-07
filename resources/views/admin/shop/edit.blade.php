@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.shop.update', $shop->id) }}" method="post" class="card" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}
        <div class="card-body">
            <h3 class="card-title">Edit Language</h3>
            @include('layouts.shared.fields.input', [
                'title' => 'Shop Name',
                'name' => 'name',
                'type' => 'text',
                'value' => $shop->name,
                'required' => 'true'
                ])
            @include('layouts.shared.fields.textarea', [
                'title' => 'Description',
                'name' => 'description',
                'ckeditor' => 'true',
                'value' => $shop->description,
                'required' => 'false'
                ])
            @include('layouts.shared.fields.input', [
                'title' => 'Shop URL',
                'name' => 'url',
                'type' => 'text',
                'value' => $shop->url,
                'required' => 'true'
                ])
            @include('layouts.shared.fields.input', [
                'title' => 'URL Key',
                'name' => 'slug',
                'type' => 'text',
                'value' => $shop->slug,
                'required' => 'true'
                ])
            @if(isset($shop->logo))
                <div>
                    <img src="{{ asset("storage/$shop->logo") }}" alt="" class="img-responsive"> <br />
                    <a onclick="return confirm('Are you sure?')" href="{{ route('admin.category.remove.image', ['shop' => $shop->id, 'image' => substr($shop->logo, 10)]) }}" class="btn btn-danger btn-sm">Remove image?</a><br />
                </div>
            @endif
            @include('layouts.shared.fields.input', [
                'title' => 'Logo',
                'name' => 'logo',
                'type' => 'file',
                'required' => 'false'
                ])
            @include('admin.shared.status-select', [
                'status' => $shop->status
                ])

            @include('admin.shared.meta-edit', ['meta_title' => $shop->meta_title, 'meta_description' => $shop->meta_description, 'meta_keywords' => $shop->meta_keywords])
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.shop.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Save Shop</button>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
