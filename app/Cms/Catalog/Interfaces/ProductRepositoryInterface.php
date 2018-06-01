<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Catalog\Interfaces;

use App\Cms\Catalog\Models\Product;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function createProduct(array $data) : Product;

    public function updateProduct(array $params, int $id) : bool;

    public function findProductById(int $id) : Product;

    public function listProducts(string $order = 'id', string $sort = 'asc') : Collection;

    public function deleteProduct(Product $category) : bool;

    public function findProductBySlug(array $slug) : Product;

    public function saveCoverImage(UploadedFile $file) : string;

    public function deleteFile(array $file, $disk = null) : bool;

}
