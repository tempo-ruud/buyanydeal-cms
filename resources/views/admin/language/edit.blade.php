@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.language.update', $language->id) }}" method="post" class="card">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
        <div class="card-body">
            <h3 class="card-title">Add new Language</h3>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" name="name" type="text" class="form-control" value="{{ $language->name ?: old('name') }}">
            </div>
            <div class="form-group">
                <label for="lang" class="form-label">Lang</label>
                <input id="lang" name="lang" type="text" class="form-control" value="{{ $language->lang ?: old('lang') }}">
            </div>
            <div class="form-group">
                <label for="iso" class="form-label">Iso</label>
                <input id="iso" name="iso" type="text" class="form-control" value="{{ $language->iso ?: old('iso') }}">
            </div>
            <div class="form-group">
                @include('admin.shared.status-select', ['status' => $language->is_active])
            </div>
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.language.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Edit Language</button>
            </div>
        </div>
    </form>

@endsection