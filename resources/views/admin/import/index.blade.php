@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Imports</h3>
            <div class="card-options">
                <a href="{{ route('admin.import.create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="fe fe-plus mr-2"></i>Add Import</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            @if($imports)
                <table class="table card-table table-vcenter">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Network</th>
                        <th>Company</th>
                        <th>URL</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($imports as $import)
                        <tr>
                            <td>{{ $import->id }}</td>
                            <td>{{ $import->network }}</td>
                            <td>{{ $import->company }}</td>
                            <td>{{ $import->feed_url }}</td>
                            <td class="w-1">
                                <form action="{{ route('admin.import.destroy', $import->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn icon" style="padding:0; background:transparent">
                                            <i class="fe fe-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td class="w-1">
                                <a class="icon" href="{{ route('admin.import.edit', $import->id) }}">
                                    <i class="fe fe-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No imports found</p>
            @endif
        </div>
    </div>

@endsection
