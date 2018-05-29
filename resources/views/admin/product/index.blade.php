@extends('layouts.admin.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Products</h3>
            <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                    <input type="search" class="form-control header-search" placeholder="Search…" tabindex="1">
                    <div class="input-icon-addon">
                        <i class="fe fe-search"></i>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table card-table table-vcenter">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Sku</th>
                        <th>Brand</th>
                        <th>Shop</th>
                        <th>Price</th>
                        <th>Special Price</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/apple-iphone7-special.jpg" alt="" class="h-8"></td>
                        <td>Apple iPhone 7 Plus 256GB Red Special Edition</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="{{ route('admin.product.edit', 1) }}">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/apple-macbook-pro.jpg" alt="" class="h-8"></td>
                        <td>Apple MacBook Pro i7 3,1GHz/16/512/Radeon 560 Space Gray</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/apple-iphone7.jpg" alt="" class="h-8"></td>
                        <td>Apple iPhone 7 32GB Jet Black</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/gopro-hero.jpg" alt="" class="h-8"></td>
                        <td>GoPro HERO6 Black</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/msi.jpg" alt="" class="h-8"></td>
                        <td>MSI GV62 i5-7300HQ/8GB/1TB/Win10X GTX1050</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/xiaomi-mi.jpg" alt="" class="h-8"></td>
                        <td>Xiaomi Mi A1 64GB Black</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/huawei-mate.jpg" alt="" class="h-8"></td>
                        <td>Huawei Mate 10 Pro Dual SIM Gray</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/sony-kd.jpg" alt="" class="h-8"></td>
                        <td>Sony KD-49XE7005</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-edit"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="https://tabler.github.io/tabler/demo/products/samsung-galaxy.jpg" alt="" class="h-8"></td>
                        <td>Samsung Galaxy A5 A520F 2017 LTE Black Sky</td>
                        <td>abcd12345</td>
                        <td>Apple</td>
                        <td>Sprii.com</td>
                        <td>AED 499</td>
                        <td>AED 299</td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                        <td>
                            <a class="icon" href="javascript:void(0)">
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