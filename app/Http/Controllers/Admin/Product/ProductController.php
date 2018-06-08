<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 07/06/2018
 * Time: 10:14
 */

namespace App\Http\Controllers\Admin\Product;

use App\Cms\Brands\Interfaces\BrandRepositoryInterface;
use App\Cms\Categories\Interfaces\CategoryRepositoryInterface;

use App\Cms\Products\Interfaces\ProductRepositoryInterface;
use App\Cms\Products\Models\Product;
use App\Cms\Products\Repositories\ProductRepository;
use App\Cms\Products\Requests\CreateProductRequest;
use App\Cms\Products\Requests\UpdateProductRequest;
use App\Cms\Products\Transformations\ProductTransformable;

use App\Cms\Tools\UploadableTrait;

use App\Http\Controllers\Controller;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use ProductTransformable, UploadableTrait;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepo;

    /**
     * ProductController constructor.
     * @param BrandRepositoryInterface $brandRepo
     * @param CategoryRepositoryInterface $categoryRepo
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(
        BrandRepositoryInterface $brandRepo,
        CategoryRepositoryInterface $categoryRepo,
        ProductRepositoryInterface $productRepo
    ) {
        $this->brandRepo = $brandRepo;
        $this->categoryRepo = $categoryRepo;
        $this->productRepo = $productRepo;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->productRepo->listProducts('id');

        $products = $list->map(function (Product $item) {
            return $this->transformProduct($item);
        })->all();

        return view('admin.product.index', [
            'products' => $this->productRepo->paginateArrayResults($products, 10)
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.create', [
            'brands' => $this->brandRepo->listBrands('name', 'asc'),
            'categories' => $this->categoryRepo->listCategories('name', 'asc'),
            'selectedIds' => []
        ]);
    }


    /**
     * @param CreateBrandRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateBrandRequest $request)
    {
        $data = $request->except('_token', '_method');

        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['image_src'] = $this->brandRepo->saveCoverImage($request->file('cover'));
        }

        $this->brandRepo->createBrand($data);

        $request->session()->flash('message', 'Brand is successfully created');
        return redirect()->route('admin.brand.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = $this->productRepo->findProductById($id);

        return view('admin.product.edit', [
            'product' => $this->productRepo->findProductById($id),
            'brands' => $this->brandRepo->listBrands(),
            'selectedIds' => $product->pluck('brand_id')->all(),
        ]);
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $brand = $this->brandRepo->findBrandById($id);

        $data = $request->except('_token', '_method');

        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $this->brandRepo->saveCoverImage($request->file('cover'));
        }

        $this->brandRepo->updateBrand($data, $id);

        $request->session()->flash('message', 'Brand is successfully updated');
        return redirect()->route('admin.brand.edit', $id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $this->brandRepo->findBrandById($id)->delete();

        request()->session()->flash('message', 'Brand is successfully deleted');
        return redirect()->route('admin.brand.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->brandRepo->deleteFile($request->only('brand', 'cover'), 'uploads');

        request()->session()->flash('message', 'Image deleted successfully');

        return redirect()->back();
    }
}