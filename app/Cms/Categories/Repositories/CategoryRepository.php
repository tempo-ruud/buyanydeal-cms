<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 08:02
 */

namespace App\Cms\Categories\Repositories;

use App\Cms\Base\Exceptions\InvalidArgumentException;
use App\Cms\Base\Exceptions\NotFoundException;
use App\Cms\Base\Repositories\BaseRepository;

use App\Cms\Categories\Interfaces\CategoryRepositoryInterface;
use App\Cms\Categories\Models\Category;

use App\Cms\Products\Models\Product;
use App\Cms\Products\Transformations\ProductTransformable;

use App\Cms\Tools\UploadableTrait;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    use UploadableTrait, ProductTransformable;

    /**
     * ShopRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->model = $category;
    }

    /**
     * List all the shops
     *
     * @param string $order
     * @param string $sort
     * @param $except = []
     * @return Collection
     */
    public function listCategories(string $order = 'id', string $sort = 'desc', $except = []) : Collection
    {
        return $this->model->orderBy($order, $sort)->get()->except($except);
    }

    /**
     * Create the product
     *
     * @param array $params
     * @return Category
     * @throws InvalidArgumentException
     */
    public function createCategory(array $params) : Category
    {
        try {
            $collection = collect($params);

            if (isset($params['name'])) {
                $slug = str_slug($params['name']);
            }

            if (isset($params['cover']) && ($params['cover'] instanceof UploadedFile)) {
                $cover = $this->uploadOne($params['cover'], 'categories');
            }

            $merge = $collection->merge(compact('slug', 'cover'));

            $category = new Category($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findCategoryById($params['parent']);
                $category->parent()->associate($parent);
            }

            $category->save();
            return $category;
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the category
     *
     * @param array $params
     * @return Category
     */
    public function updateCategory(array $params) : Category
    {
        $category = $this->findCategoryById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = str_slug($collection->get('name'));

        if (isset($params['cover']) && ($params['cover'] instanceof UploadedFile)) {
            $cover = $this->uploadOne($params['cover'], 'categories');
        }

        $merge = $collection->merge(compact('slug', 'cover'));
        if (isset($params['parent'])) {
            $parent = $this->findCategoryById($params['parent']);
            $category->parent()->associate($parent);
        }

        $category->update($merge->all());
        return $category;
    }

    /**
     * Find the shop by ID
     *
     * @param int $id
     * @return Category
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
     * @return bool
     * @throws \Exception
     */
    public function deleteCategory() : bool
    {
        return $this->model->delete();
    }

    /**
     * Associate a product in a category
     *
     * @param Product $product
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function associateProduct(Product $product)
    {
        return $this->model->products()->save($product);
    }

    /**
     * Return all the products associated with the category
     *
     * @return mixed
     */
    public function findProducts() : Collection
    {
        return $this->model->products;
    }

    /**
     * @param array $params
     */
    public function syncProducts(array $params)
    {
        $this->model->products()->sync($params);
    }


    /**
     * Detach the association of the product
     *
     */
    public function detachProducts()
    {
        $this->model->products()->detach();
    }

    /**
     * @param $file
     * @param null $disk
     * @return bool
     */
    public function deleteFile(array $file, $disk = null) : bool
    {
        return $this->update(['cover' => null], $file['category']);
    }

    /**
     * Get the product via slug
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
     * @return mixed
     */
    public function findParentCategory()
    {
        return $this->model->parent;
    }

    /**
     * @return mixed
     */
    public function findChildren()
    {
        return $this->model->children;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function saveCoverImage(UploadedFile $file) : string
    {
        return $file->store('category', ['disk' => 'public']);
    }
}