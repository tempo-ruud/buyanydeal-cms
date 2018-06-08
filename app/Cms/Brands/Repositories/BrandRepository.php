<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 08:02
 */

namespace App\Cms\Brands\Repositories;

use App\Cms\Base\Exceptions\InvalidArgumentException;
use App\Cms\Base\Exceptions\NotFoundException;
use App\Cms\Base\Repositories\BaseRepository;

use App\Cms\Brands\Interfaces\BrandRepositoryInterface;
use App\Cms\Brands\Models\Brand;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class BrandRepository extends BaseRepository implements BrandRepositoryInterface
{
    /**
     * BrandRepository constructor.
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        parent::__construct($brand);
        $this->model = $brand;
    }

    /**
     * List all the brands
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * Create the product
     *
     * @param array $params
     * @return Brand
     */
    public function createBrand(array $params) : Brand
    {
        try {
            $brand = new Brand($params);
            $brand->save();
            return $brand;
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the brand
     *
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function updateBrand(array $params, int $id) : bool
    {
        try {
            return $this->update($params, $id);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Find the brand by ID
     *
     * @param int $id
     * @return Brand
     */
    public function findBrandById(int $id) : Brand
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException($e->getMessage());
        }
    }


    /**
     * @param Brand $brand
     * @return bool
     * @throws \Exception
     */
    public function deleteBrand(Brand $brand) : bool
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
        return $this->update(['cover' => null], $file['brand']);
    }

    /**
     * Get the product via slug
     *
     * @param array $slug
     * @return Brand
     */
    public function findBrandBySlug(array $slug) : Brand
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
        return $file->store('brands', ['disk' => 'public']);
    }
}