@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div id="accordion">
            <div class="card">
                <div class="card-header" id="infoHeading">
                    <h5 class="mb-0">
                        <a class="btn btn-link" data-toggle="collapse" data-target="#productInfo" aria-expanded="true" aria-controls="productInfo">
                            Product Information
                        </a>
                    </h5>
                </div>

                <div id="productInfo" class="collapse show" aria-labelledby="infoHeading" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="slug" name="slug" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="is_active" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-3">
                                    <select id="is_active" name="is_active" class="form-control custom-select" required>
                                        <option value="1">Enabled</option>
                                        <option value="0">Disabled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="in_stock" class="col-sm-2 col-form-label">Stock Status</label>
                                <div class="col-sm-3">
                                    <select id="in_stock" name="in_stock" class="form-control custom-select" required>
                                        <option value="1">In stock</option>
                                        <option value="0">Out of stock</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="brand" name="brand" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="sku" class="col-sm-2 col-form-label">SKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="sku" name="sku" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="content" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control ckeditor" name="content" id="content" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="url" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="url" name="url" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="priceHeading">
                    <h5 class="mb-0">
                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#productPrice" aria-expanded="false" aria-controls="productPrice">
                            Product Prices
                        </a>
                    </h5>
                </div>
                <div id="productPrice" class="collapse" aria-labelledby="priceHeading" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="currency" class="col-sm-2 col-form-label">Currency</label>
                                <div class="col-sm-10">
                                    <input id="currency" name="currency" type="text" class="form-control" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="original_price" class="col-sm-2 col-form-label">Original Price</label>
                                <div class="col-sm-10">
                                    <input id="original_price" name="original_price" type="text" class="form-control" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="special_price" class="col-sm-2 col-form-label">Special Price</label>
                                <div class="col-sm-10">
                                    <input id="special_price" name="special_price" type="text" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="delivery_time" class="col-sm-2 col-form-label">Delivery Time</label>
                                <div class="col-sm-10">
                                    <input id="delivery_time" name="delivery_time" type="text" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="delivery_cost" class="col-sm-2 col-form-label">Delivery Cost</label>
                                <div class="col-sm-10">
                                    <input id="delivery_cost" name="delivery_cost" type="text" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="imageHeading">
                    <h5 class="mb-0">
                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#productImage" aria-expanded="false" aria-controls="productImage">
                            Images
                        </a>
                    </h5>
                </div>
                <div id="productImage" class="collapse" aria-labelledby="imageHeading" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="image_src" class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <input id="image_src" name="image_src" type="file" class="form-control" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTFour">
                    <h5 class="mb-0">
                        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            SEO
                        </a>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTFour" data-parent="#accordion">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="meta_title" class="col-sm-2 col-form-label">Page Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="meta_description" class="col-sm-2 col-form-label">Keywords</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="6" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="meta_keywords" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-link">Cancel</a>
                    <button type="submit" class="btn btn-primary ml-auto">Save Product</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('footerjs')
    <script src="{{ asset('//cdn.ckeditor.com/4.8.0/standard/ckeditor.js') }}"></script>
@endsection
