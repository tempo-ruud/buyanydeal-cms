<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 07:28
 */

namespace App\Cms\ProductImages\Repositories;

use App\Cms\Base\BaseRepository;
use App\Cms\Products\Models\Product;

class ProductImageRepository extends BaseRepository
{
    /**
     * ProductImageRepository constructor.
     * @param ProductImage $productImage
     */
    public function __construct(ProductImage $productImage)
    {
        parent::__construct($productImage);
        $this->model = $productImage;
    }

    /**
     * @return mixed
     */
    public function findProduct() : Product
    {
        return $this->model->product;
    }
}