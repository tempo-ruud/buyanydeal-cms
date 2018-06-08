<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 07:57
 */

namespace App\Cms\Products\Interfaces;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;
use App\Cms\Products\Models\Product;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param string $order = 'id'
     * @param string $sort = 'desc'
     * @param array $columns = ['*']
     * @return Collection
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;

    /**
     * @param array $data
     * @return Shop
     */
//    public function createProduct(array $data) : Product;

    /**
     * @param array $params
     * @param int $id
     * @return bool
     */
//    public function updateProduct(array $params, int $id) : bool;


    /**
     * @param int $id
     * @return Product
     */
    public function findProductById(int $id) : Product;

    /**
     * @param Product $product
     * @return bool
     */
//    public function deleteProduct(Product $product) : bool;

    /**
     * @return mixed
     */
//    public function detachCategories();

    /**
     * @return Collection
     */
//    public function getCategories() : Collection;

    /**
     * @param array $params
     * @return mixed
     */
//    public function syncCategories(array $params);

    /**
     * @param array $file
     * @param $disk = null
     * @return bool
     */
//    public function deleteFile(array $file, $disk = null) : bool;

    /**
     * @param string $src
     * @return bool
     */
//    public function deleteThumb(string $src) : bool;

    /**
     * @param array $slug
     * @return Product
     */
//    public function findProductBySlug(array $slug) : Product;

    /**
     * @return Collection
     */
//    public function findProductImages() : Collection;

    /**
     * @param UploadedFile $file
     * @return string
     */
//    public function saveCoverImage(UploadedFile $file) : string;

    /**
     * @param Collection $collection
     * @param Product $product
     * @return mixed
     */
//    public function saveProductImages(Collection $collection, Product $product);

}