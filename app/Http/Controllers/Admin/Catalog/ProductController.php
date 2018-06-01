<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 28/05/2018
 * Time: 06:37
 */

namespace App\Http\Controllers\Admin\Catalog;

use App\Cms\Catalog\Interfaces\ProductRepositoryInterface;
use App\Cms\Catalog\Repositories\ProductRepository;
use App\Cms\Catalog\Requests\CreateProductRequest;
use App\Cms\Catalog\Requests\UpdateProductRequest;
use App\Cms\Catalog\Transformations\ProductTransformable;
use App\Cms\Tools\UploadableTrait;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    use ProductTransformable, UploadableTrait;

    /**
     * @var RepositoryInterface
     */
    private $productRepo;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepo = $productRepository;
    }

    public function index()
    {
        return view('admin.product.index',
            ['products' => $this->productRepo->listProducts('id', 'asc')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = str_slug($request->input('name'));

        if ($request->hasFile('image_src') && $request->file('image_src') instanceof UploadedFile) {
            $data['image_src'] = $this->productRepo->saveCoverImage($request->file('image_src'));
        }

        $this->productRepo->createProduct($data);

        $request->session()->flash('message', 'Create successful');
        return redirect()->route('admin.product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit', ['product' => $this->productRepo->findProductById($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * * @param  UpdateProductRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, int $id)
    {
        $product = $this->productRepo->findProductById($id);

        $data = $request->except('_token', '_method');
        $data['slug'] = str_slug($request->input('name'));

        if ($request->hasFile('image_src') && $request->file('image_src') instanceof UploadedFile) {
            $data['image_src'] = $this->productRepo->saveCoverImage($request->file('image_src'));
        }

        $this->productRepo->updateProduct($data, $id);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.product.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $this->productRepo->delete($id);

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.product.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->productRepo->deleteFile($request->only('product', 'image'), 'uploads');
        request()->session()->flash('message', 'Image delete successful');
        return redirect()->back();
    }
}