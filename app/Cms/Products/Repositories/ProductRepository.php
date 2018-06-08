<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 08:02
 */

namespace App\Cms\Products\Repositories;

use App\Cms\Base\Exceptions\InvalidArgumentException;
use App\Cms\Base\Exceptions\NotFoundException;
use App\Cms\Base\Repositories\BaseRepository;

use App\Cms\Products\Interfaces\ProductRepositoryInterface;
use App\Cms\Products\Models\Product;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * ShopRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
        $this->model = $product;
    }

    /**
     * List all the shops
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * Create the product
     *
     * @param array $params
     * @return Shop
     */
    public function createShop(array $params) : Shop
    {
        try {
            $shop = new Shop($params);
            $shop->save();
            return $shop;
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the shop
     *
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function updateShop(array $params, int $id) : bool
    {
        try {
            return $this->update($params, $id);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Find the shop by ID
     *
     * @param int $id
     * @return Product
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
     * @param Shop $shop
     * @return bool
     * @throws \Exception
     */
    public function deleteShop(Shop $shop) : bool
    {
        return $this->model->delete();
    }

    /**
     * @param $file
     * @param null $disk
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool
    {
        return $this->update(['cover' => null], $file['shop']);
    }

    /**
     * Get the product via slug
     *
     * @param array $slug
     * @return Shop
     */
    public function findShopBySlug(array $slug) : Shop
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
        return $file->store('shops', ['disk' => 'public']);
    }
}