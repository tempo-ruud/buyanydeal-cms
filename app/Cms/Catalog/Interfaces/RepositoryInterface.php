<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Catalog\Interfaces;

use App\Cms\Catalog\Models\Category;
use App\Cms\Catalog\Models\Product;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface RepositoryInterface extends BaseRepositoryInterface
{
    public function createCategory(array $data) : Category;

    public function createProduct(array $data) : Product;

    public function updateCategory(array $params, int $id) : bool;

    public function updateProduct(array $params, int $id) : bool;

    public function findCategoryById(int $id) : Category;

    public function findProductById(int $id) : Product;

    public function listCategories(string $order = 'id', string $sort = 'asc') : Collection;

    public function listProducts(string $order = 'id', string $sort = 'asc') : Collection;

    public function deleteCategory(Category $category) : bool;

    public function deleteProduct(Product $category) : bool;

    public function findCategoryBySlug(array $slug) : Category;

    public function findProductBySlug(array $slug) : Product;

    public function saveCoverImage(UploadedFile $file) : string;

    public function deleteFile(array $file, $disk = null) : bool;

}
