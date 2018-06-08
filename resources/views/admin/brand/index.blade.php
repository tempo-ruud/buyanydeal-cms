@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Brands</h3>
            <div class="card-options">
                <a href="{{ route('admin.brand.create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="fe fe-plus mr-2"></i>Add Brand</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            @if($brands)
                <table class="table card-table table-vcenter">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Active</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>{{ $brand->is_active }}</td>
                            <td class="w-1">
                                <form action="{{ route('admin.brand.destroy', $brand->id) }}" method="post">
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
                                <a class="icon" href="{{ route('admin.brand.edit', $brand->id) }}">
                                    <i class="fe fe-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
