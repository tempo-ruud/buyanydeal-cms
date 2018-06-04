@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.import.store') }}" method="post" class="card" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <h3 class="card-title">Add New Import</h3>
            <div class="form-group">
                <label for="network" class="form-label">Network</label>
                <input id="network" name="network" type="text" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="company" class="form-label">Company</label>
                <input id="company" name="company" type="text" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="feed_url" class="form-label">Feed URL</label>
                <input id="feed_url" name="feed_url" type="text" class="form-control" value="">
            </div>
        </div>
        <div class="card-footer text-right">
            <div class="d-flex">
                <a href="{{ route('admin.import.index') }}" class="btn btn-link">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Add Import</button>
            </div>
        </div>
    </form>

@endsection
