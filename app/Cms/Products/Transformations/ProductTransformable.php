<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 07/06/2018
 * Time: 16:49
 */

namespace App\Cms\Products\Transformations;

use App\Cms\Brands\Models\Brand;
use App\Cms\Brands\Repositories\BrandRepository;
use App\Cms\Products\Models\Product;

use Illuminate\Support\Facades\Storage;

trait ProductTransformable
{
    /**
     * Transform the product
     *
     * @param Product $product
     * @return Product
     */
    protected function transformProduct(Product $product)
    {
        $file = Storage::disk('public')->exists($product->cover) ? $product->cover : null;

        $prod = new Product;
        $prod->id = (int) $product->id;
        $prod->name = $product->name;
        $prod->sku = $product->sku;
        $prod->ean = $product->ean;
        $prod->slug = $product->slug;
        $prod->description = $product->description;
        $prod->cover = $file;
        $prod->meta_title = $product->meta_title;
        $prod->meta_description = $product->meta_description;
        $prod->meta_keywords = $product->meta_keywords;
        $prod->status = $product->status;

        $brandRepo = new BrandRepository(new Brand());
        $prod->brand = $brandRepo->findBrandById($product->brand_id);

        return $prod;
    }
}