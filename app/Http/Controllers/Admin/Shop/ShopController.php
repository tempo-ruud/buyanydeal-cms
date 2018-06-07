<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 07/06/2018
 * Time: 10:14
 */

namespace App\Http\Controllers\Admin\Shop;

use App\Cms\Shops\Interfaces\ShopRepositoryInterface;
use App\Cms\Shops\Requests\CreateShopRequest;
use App\Cms\Shops\Requests\UpdateShopRequest;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ShopController extends Controller
{
    /**
     * @var ShopRepositoryInterface
     */
    private $shopRepo;

    /**
     * ShopController constructor.
     * @param ShopRepositoryInterface $shopRepository
     */
    public function __construct(ShopRepositoryInterface $shopRepository)
    {
        $this->shopRepo = $shopRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.shop.index',
            ['shops' => $this->shopRepo->listShops('id', 'asc')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shop.create');
    }


    /**
     * @param CreateShopRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateShopRequest $request)
    {
        $data = $request->except('_token', '_method');

        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['image_src'] = $this->shopRepo->saveCoverImage($request->file('cover'));
        }

        $this->shopRepo->createShop($data);

        $request->session()->flash('message', 'Shop is successfully created');
        return redirect()->route('admin.shop.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.shop.edit', ['shop' => $this->shopRepo->findShopById($id)]);
    }

    public function update(UpdateShopRequest $request, int $id)
    {
        $shop = $this->shopRepo->findShopById($id);

        $data = $request->except('_token', '_method');

        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $this->shopRepo->saveCoverImage($request->file('cover'));
        }

        $this->shopRepo->updateShop($data, $id);

        $request->session()->flash('message', 'Shop is successfully updated');
        return redirect()->route('admin.shop.edit', $id);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id)
    {
        $this->shopRepo->findShopById($id)->delete();

        request()->session()->flash('message', 'Shop is successfully deleted');
        return redirect()->route('admin.shop.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->shopRepo->deleteFile($request->only('shop', 'cover'), 'uploads');

        request()->session()->flash('message', 'Image deleted successfully');

        return redirect()->back();
    }
}