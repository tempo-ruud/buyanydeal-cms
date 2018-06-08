<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 07:57
 */

namespace App\Cms\Categories\Interfaces;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;
use App\Cms\Categories\Models\Category;
use App\Cms\Products\Models\Product;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param string $order = 'id'
     * @param string $sort = 'desc'
     * @param $except = []
     * @return Collection
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', $except = []) : Collection;

    /**
     * @param array $params
     * @return Category
     */
    public function createCategory(array $params) : Category;

    /**
     * @param array $params
     * @return Category
     */
    public function updateCategory(array $params) : Category;


    /**
     * @param int $id
     * @return Category
     */
    public function findCategoryById(int $id) : Category;

    /**
     * @return bool
     */
    public function deleteCategory() : bool;

    /**
     * @param Product $product
     * @return mixed
     */
    public function associateProduct(Product $product);

    /**
     * @return Collection
     */
    public function findProducts() : Collection;

    /**
     * @param array $params
     * @return mixed
     */
    public function syncProducts(array $params);

    /**
     * @return mixed
     */
    public function detachProducts();

    /**
     * @param array $file
     * @param $disk = null
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool;

    /**
     * @param array $slug
     * @return Shop
     */
    public function findCategoryBySlug(array $slug) : Category;

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveCoverImage(UploadedFile $file) : string;

}