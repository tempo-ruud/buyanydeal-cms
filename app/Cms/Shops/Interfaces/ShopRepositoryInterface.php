<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 07:57
 */

namespace App\Cms\Shops\Interfaces;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;
use App\Cms\Shops\Models\Shop;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface ShopRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param string $order = 'id'
     * @param string $sort = 'desc'
     * @param array $columns = ['*']
     * @return Collection
     */
    public function listShops(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;

    /**
     * @param array $data
     * @return Shop
     */
    public function createShop(array $data) : Shop;

    /**
     * @param array $params
     * @param int $id
     * @return bool
     */
    public function updateShop(array $params, int $id) : bool;


    /**
     * @param int $id
     * @return Shop
     */
    public function findShopById(int $id) : Shop;

    /**
     * @param Shop $shop
     * @return bool
     */
    public function deleteShop(Shop $shop) : bool;

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
    public function findShopBySlug(array $slug) : Shop;

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveCoverImage(UploadedFile $file) : string;

}