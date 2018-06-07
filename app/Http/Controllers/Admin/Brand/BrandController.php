<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 07/06/2018
 * Time: 10:14
 */

namespace App\Http\Controllers\Admin\Brand;

use App\Cms\Brands\Interfaces\BrandRepositoryInterface;
use App\Cms\Brands\Requests\CreateBrandRequest;
use App\Cms\Brands\Requests\UpdateBrandRequest;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BrandController extends Controller
{
    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepo;

    /**
     * BrandController constructor.
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepo = $brandRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.brand.index',
            ['brands' => $this->brandRepo->listBrands('id', 'asc')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.brand.create');
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
        return view('admin.brand.edit', ['brand' => $this->brandRepo->findBrandById($id)]);
    }

    public function update(UpdateBrandRequest $request, int $id)
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