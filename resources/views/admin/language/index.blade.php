@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Languages</h3>
            <div class="card-options">
                <a href="{{ route('admin.language.create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="fe fe-plus mr-2"></i>Add Language</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            @if($languages)
                <table class="table card-table table-vcenter">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Lang</th>
                        <th>Iso</th>
                        <th>Default</th>
                        <th>Active</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($languages as $language)
                        <tr>
                            <td>{{ $language->id }}</td>
                            <td>{{ $language->name }}</td>
                            <td>{{ $language->lang }}</td>
                            <td>{{ $language->iso }}</td>
                            <td>{{ $language->default }}</td>
                            <td>{{ $language->is_active }}</td>
                            <td class="w-1">
                                <form action="{{ route('admin.language.destroy', $language->id) }}" method="post">
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
                                <a class="icon" href="{{ route('admin.language.edit', $language->id) }}">
                                    <i class="fe fe-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No languages found</p>
            @endif
        </div>
    </div>

@endsection
