<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 28/05/2018
 * Time: 06:35
 */

namespace App\Http\Controllers\Admin\Catalog;

use App\Cms\Catalog\Interfaces\RepositoryInterface;
use App\Cms\Catalog\Repositories\CategoryRepository;
use App\Cms\Catalog\Requests\CreateCategoryRequest;
use App\Cms\Catalog\Requests\UpdateCategoryRequest;
use App\Cms\Catalog\Transformations\CategoryTransformable;
use App\Cms\Tools\UploadableTrait;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


class CategoryController extends Controller
{
    use CategoryTransformable, UploadableTrait;

    /**
     * @var RepositoryInterface
     */
    private $categoryRepo;

    /**
     * CategoryController constructor.
     * @param RepositoryInterface $categoryRepository
     */
    public function __construct(RepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.category.index',
            ['categories' => $this->categoryRepo->listCategories('id', 'asc')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.category.create', [
            'categories' => $this->categoryRepo->listCategories('name', 'asc')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = str_slug($request->input('name'));

        if ($request->hasFile('image_src') && $request->file('image_src') instanceof UploadedFile) {
            $data['image_src'] = $this->categoryRepo->saveCoverImage($request->file('image_src'));
        }

        if ($request->hasFile('thumbnail_src') && $request->file('thumbnail_src') instanceof UploadedFile) {
            $data['thumbnail_src'] = $this->categoryRepo->saveCoverImage($request->file('thumbnail_src'));
        }

        if ($request->hasFile('icon_src') && $request->file('icon_src') instanceof UploadedFile) {
            $data['icon_src'] = $this->categoryRepo->saveCoverImage($request->file('icon_src'));
        }

        $this->categoryRepo->createCategory($data);

        $request->session()->flash('message', 'Create successful');
        return redirect()->route('admin.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('admin.category.edit', ['category' => $this->categoryRepo->findCategoryById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, int $id)
    {
        $category = $this->categoryRepo->findCategoryById($id);

        $data = $request->except('_token', '_method');
        $data['slug'] = str_slug($request->input('name'));

        if ($request->hasFile('image_src') && $request->file('image_src') instanceof UploadedFile) {
            $data['image_src'] = $this->categoryRepo->saveCoverImage($request->file('image_src'));
        }

        if ($request->hasFile('thumbnail_src') && $request->file('thumbnail_src') instanceof UploadedFile) {
            $data['thumbnail_src'] = $this->categoryRepo->saveCoverImage($request->file('thumbnail_src'));
        }

        if ($request->hasFile('icon_src') && $request->file('icon_src') instanceof UploadedFile) {
            $data['icon_src'] = $this->categoryRepo->saveCoverImage($request->file('icon_src'));
        }

        $this->categoryRepo->updateCategory($data, $id);

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.category.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $this->categoryRepo->delete($id);

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.category.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->categoryRepo->deleteFile($request->only('category', 'image'), 'uploads');
        request()->session()->flash('message', 'Image delete successful');
        return redirect()->back();
    }
}