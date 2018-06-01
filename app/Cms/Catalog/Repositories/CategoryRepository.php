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
use App\Cms\Catalog\Interfaces\RepositoryInterface;
use App\Cms\Catalog\Models\Category;
use App\Cms\Catalog\Transformations\CategoryTransformable;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements RepositoryInterface
{
    use CategoryTransformable;

    /**
     * OrderStatusRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->model = $category;
    }

    /**
     * Create the order status
     *
     * @param array $params
     * @return Category
     * @throws InvalidArgumentException
     */
    public function createCategory(array $params) : Category
    {
        try {
            $category = new Category($params);
            $category->save();
            return $category;
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the order status
     *
     * @param array $update
     * @return Category
     * @throws InvalidArgumentException
     */
    public function updateCategory(array $params, int $id) : bool
    {
        try {
            return $this->update($params, $id);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return Category
     * @throws NotFoundException
     */
    public function findCategoryById(int $id) : Category
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
    public function listCategories(string $order = 'id', string $sort = 'desc') : Collection
    {
        return $this->model->orderBy($order, $sort)->get();
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function deleteCategory(Category $category) : bool
    {
        return $this->delete($category->id);
    }

    /**
     * Return the category by using the slug as the parameter
     *
     * @param array $slug
     * @return Category
     */
    public function findCategoryBySlug(array $slug) : Category
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
        return $file->store('categories', ['disk' => 'public']);
    }

    /**
     * @param $file
     * @param null $disk
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool
    {
        return $this->update(['image_src' => null], $file['category']);
    }

}
