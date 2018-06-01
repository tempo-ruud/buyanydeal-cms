<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Catalog\Repositories;

use App\Cms\Base\Repositories\BaseRepository;
use App\Cms\Catalog\Exceptions\InvalidArgumentException;
use App\Cms\Catalog\Exceptions\NotFoundException;
use App\Cms\Catalog\Interfaces\ProductRepositoryInterface;
use App\Cms\Catalog\Models\Product;
use App\Cms\Catalog\Transformations\ProductTransformable;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    use ProductTransformable;

    /**
     * OrderStatusRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
        $this->model = $product;
    }

    /**
     * Create the order status
     *
     * @param array $params
     * @return Product
     * @throws InvalidArgumentException
     */
    public function createProduct(array $params) : Product
    {
        try {
            $product = new Product($params);
            $product->save();
            return $product;
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the order status
     *
     * @param array $update
     * @return Product
     * @throws InvalidArgumentException
     */
    public function updateProduct(array $params, int $id) : bool
    {
        try {
            return $this->update($params, $id);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return Product
     * @throws NotFoundException
     */
    public function findProductById(int $id) : Product
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException($e->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function listProducts(string $order = 'id', string $sort = 'desc') : Collection
    {
        return $this->model->orderBy($order, $sort)->get();
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function deleteProduct(Product $product) : bool
    {
        return $this->delete($product->id);
    }

    /**
     * Return the category by using the slug as the parameter
     *
     * @param array $slug
     * @return Product
     */
    public function findProductBySlug(array $slug) : Product
    {
        try {
            return $this->findOneByOrFail($slug);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException($e->getMessage());
        }
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveCoverImage(UploadedFile $file) : string
    {
        return $file->store('products', ['disk' => 'public']);
    }

    /**
     * @param $file
     * @param null $disk
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool
    {
        return $this->update(['image_src' => null], $file['product']);
    }

}