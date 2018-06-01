@extends('layouts.admin.app')

@section('content')

    @include('layouts.errors-and-messages')

    <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
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
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?: old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug ?: old('slug') }}" required>
                        </div>
                        @include('admin.shared.status-select', ['status' => $product->is_active])
                        @include('admin.shared.stock-select', ['stock' => $product->in_stock])
                        <div class="form-group">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="{{ $product->brand ?: old('brand') }}">
                        </div>
                        <div class="form-group">
                            <label for="sku" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="sku" name="sku" value="{{ $product->sku ?: old('sku') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="content" class="form-label">Description</label>
                            <textarea class="form-control ckeditor" name="content" id="content" rows="6">{{ $product->content ?: old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{ $product->url ?: old('url') }}" required>
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
                            <label for="currency" class="form-label">Currency</label>
                            <input id="currency" name="currency" type="text" class="form-control" value="{{ $product->currency ?: old('currency') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="original_price" class="form-label">Original Price</label>
                            <input id="original_price" name="original_price" type="text" class="form-control" value="{{ $product->original_price ?: old('original_price') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="special_price" class="form-label">Special Price</label>
                            <input id="special_price" name="special_price" type="text" class="form-control" value="{{ $product->special_price ?: old('special_price') }}">
                        </div>
                        <div class="form-group">
                            <label for="delivery_time" class="form-label">Delivery Time</label>
                            <input id="delivery_time" name="delivery_time" type="text" class="form-control" value="{{ $product->delivery_time ?: old('delivery_time') }}">
                        </div>
                        <div class="form-group">
                            <label for="delivery_cost" class="form-label">Delivery Cost</label>
                            <input id="delivery_cost" name="delivery_cost" type="text" class="form-control" value="{{ $product->delivery_cost ?: old('delivery_cost') }}">
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
                        @if(isset($product->image_src))
                            <div>
                                <img src="{{ asset("storage/$product->image_src") }}" alt="" class="img-responsive"> <br />
                                <a onclick="return confirm('Are you sure?')" href="{{ route('admin.product.remove.image', ['product' => $product->id, 'image' => substr($product->image_src, 10)]) }}" class="btn btn-danger btn-sm">Remove image?</a><br />
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="image_src" class="form-label">Product Image</label>
                            <input id="image_src" name="image_src" type="file" class="form-control" value="">
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
                        @include('admin.shared.meta-edit', ['meta_title' => $product->meta_title, 'meta_description' => $product->meta_description, 'meta_keywords' => $product->meta_keywords])
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
