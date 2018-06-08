<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 07:57
 */

namespace App\Cms\Brands\Interfaces;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;
use App\Cms\Brands\Models\Brand;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface BrandRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param string $order = 'id'
     * @param string $sort = 'desc'
     * @param array $columns = ['*']
     * @return Collection
     */
    public function listBrands(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;

    /**
     * @param array $data
     * @return Brand
     */
    public function createBrand(array $data) : Brand;

    /**
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function updateBrand(array $params, int $id) : bool;


    /**
     * @param int $id
     * @return Brand
     */
    public function findBrandById(int $id) : Brand;

    /**
     * @param Brand $brand
     * @return bool
     */
    public function deleteBrand(Brand $brand) : bool;

    /**
     * @param array $file
     * @param $disk = null
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool;

    /**
     * @param array $slug
     * @return Brand
     */
    public function findBrandBySlug(array $slug) : Brand;

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveCoverImage(UploadedFile $file) : string;

}