@extends('layouts.admin.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products</h3>
            <div class="card-options">
                <a href="{{ route('admin.product.create') }}" class="btn btn-outline-primary btn-sm float-right"><i class="fe fe-plus mr-2"></i>Add Product</a>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Sku</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Special Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <img src="{{ asset("storage/$product->image_src") }}" alt="" class="h-8">
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->original_price }}</td>
                        <td>{{ $product->special_price }}</td>
                        <td class="w-1">
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn icon" style="padding:0; background:transparent">
                                        <i class="fe fe-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a class="icon" href="{{ route('admin.product.edit', $product->id) }}">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection