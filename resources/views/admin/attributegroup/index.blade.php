@extends('layouts.admin.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product Attributes</h3>
        </div>
        <div class="card-body table-responsive">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="w-1"></th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>brands</td>
                    <td class="w-1">
                        <a class="icon" href="javascript:void(0)">
                            <i class="fe fe-trash"></i>
                        </a>
                    </td>
                    <td class="w-1">
                        <a class="icon" href="{{ route('admin.product.edit', 1) }}">
                            <i class="fe fe-edit"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>brands</td>
                    <td class="w-1">
                        <a class="icon" href="javascript:void(0)">
                            <i class="fe fe-trash"></i>
                        </a>
                    </td>
                    <td class="w-1">
                        <a class="icon" href="{{ route('admin.product.edit', 1) }}">
                            <i class="fe fe-edit"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>brands</td>
                    <td class="w-1">
                        <a class="icon" href="javascript:void(0)">
                            <i class="fe fe-trash"></i>
                        </a>
                    </td>
                    <td class="w-1">
                        <a class="icon" href="{{ route('admin.product.edit', 1) }}">
                            <i class="fe fe-edit"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>brands</td>
                    <td class="w-1">
                        <a class="icon" href="javascript:void(0)">
                            <i class="fe fe-trash"></i>
                        </a>
                    </td>
                    <td class="w-1">
                        <a class="icon" href="{{ route('admin.product.edit', 1) }}">
                            <i class="fe fe-edit"></i>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

@endsection