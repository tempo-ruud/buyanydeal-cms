<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Http\Controllers\Front\Product;

use App\Cms\Catalog\Interfaces\ProductRepositoryInterface;
use App\Cms\Catalog\Models\Product;
use App\Cms\Catalog\Repositories\ProductRepository;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $productRepo;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    /**
     * Find the category via the slug
     *
     * @param string $slug
     * @return \App\Cms\Cms\Models\CmsPage
     */
    public function getProduct(string $slug)
    {

        $product = $this->productRepo->findProductBySlug(['slug' => $slug]);

        return view('front.product.page', [
            'product' => $product
        ]);
    }
}