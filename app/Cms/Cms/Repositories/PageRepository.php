<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Cms\Repositories;

use App\Cms\Base\Repositories\BaseRepository;

use App\Cms\Cms\Exceptions\InvalidArgumentException;
use App\Cms\Cms\Exceptions\NotFoundException;
use App\Cms\Cms\Interfaces\RepositoryInterface;
use App\Cms\Cms\Models\CmsPage;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class PageRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * OrderStatusRepository constructor.
     * @param CmsPage $page
     */
    public function __construct(CmsPage $page)
    {
        parent::__construct($page);
        $this->model = $page;
    }

    /**
     * Create the order status
     *
     * @param array $params
     * @return CmsPage
     * @throws InvalidArgumentException
     */
    public function createPage(array $params) : CmsPage
    {
        try {
            return $this->create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the order status
     *
     * @param array $update
     * @return CmsPage
     * @throws InvalidArgumentException
     */
    public function updatePage(array $params) : CmsPage
    {
        try {
            $this->update($params, $this->model->id);
            return $this->find($this->model->id);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return CmsPage
     * @throws NotFoundException
     */
    public function findPageById(int $id) : CmsPage
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
    public function listPages(string $order = 'id', string $sort = 'desc') : Collection
    {
        return $this->model->orderBy($order, $sort)->get();
    }

    /**
     * @param CmsPage $cmspage
     * @return bool
     */
    public function deletePage(CmsPage $cmspage) : bool
    {
        return $this->delete($cmspage->id);
    }

    /**
     * Return the category by using the slug as the parameter
     *
     * @param array $slug
     * @return CmsPage
     */
    public function findPageBySlug(array $slug) : CmsPage
    {
        try {
            return $this->findOneByOrFail($slug);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException($e->getMessage());
        }
    }

}
