<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Cms\Interfaces;

use App\Cms\Cms\Models\CmsPage;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;

use Illuminate\Support\Collection;

interface RepositoryInterface extends BaseRepositoryInterface
{
    public function createPage(array $page) : CmsPage;

    public function updatePage(array $update) : CmsPage;

    public function findPageById(int $id) : CmsPage;

    public function listPages(string $order = 'id', string $sort = 'asc') : Collection;

    public function deletePage(CmsPage $cmsPage) : bool;

    public function findPageBySlug(array $slug) : CmsPage;

}
