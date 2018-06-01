<?php

namespace App\Cms\Catalog\Transformations;

use App\Cms\Catalog\Models\Product;

use Illuminate\Support\Facades\Storage;

trait ProductTransformable
{
    /**
     * Transform the product
     *
     * @param Product $product
     * @return Product
     */
    protected function transformCategory(Product $product)
    {
        $image_src = Storage::disk('public')->exists($product->image_src) ? $product->image_src : null;

        $prod = new Product;
        $prod->id                = (int) $product->id;
        $prod->sku               = $product->sku;
        $prod->name              = $product->name;
        $prod->brand             = $product->brand;
        $prod->content           = $product->content;
        $prod->url               = $product->url;
        $prod->currency          = $product->currency;
        $prod->original_price    = $product->original_price;
        $prod->special_price     = $product->special_price;
        $prod->delivery_cost     = $product->delivery_cost;
        $prod->delivery_time     = $product->delivery_time;
        $prod->image_src         = $image_src;
        $prod->meta_title        = $product->meta_title;
        $prod->meta_description  = $product->meta_description;
        $prod->meta_keywords     = $product->meta_keywords;
        $prod->slug              = $product->slug;
        $prod->in_stock          = $product->in_stock;
        $prod->is_active         = $product->is_active;

        return $prod;
    }
}
