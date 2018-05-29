@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.language.store') }}" method="post" class="card" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <h3 class="card-title">Add new Language</h3>
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input id="name" name="name" type="text" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="lang" class="form-label">Lang</label>
                <input id="lang" name="lang" type="text" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="iso" class="form-label">Iso</label>
                <input id="iso" name="iso" type="text" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="is_active" class="form-label">Enabled</label>
                <select id="is_active" name="is_active" class="form-control custom-select">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.language.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Add Language</button>
            </div>
        </div>
    </form>

@endsection
