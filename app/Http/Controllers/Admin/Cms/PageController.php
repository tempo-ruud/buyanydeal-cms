<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 28/05/2018
 * Time: 06:36
 */

namespace App\Http\Controllers\Admin\Cms;

use App\Cms\Cms\Interfaces\RepositoryInterface;
use App\Cms\Cms\Repositories\PageRepository;
use App\Cms\Cms\Requests\CreatePageRequest;
use App\Cms\Cms\Requests\UpdatePageRequest;

use App\Http\Controllers\Controller;

class PageController extends Controller
{

    private $pageRepo;

    /**
     * PageController constructor.
     * @param RepositoryInterface $pageRepository
     */
    public function __construct(RepositoryInterface $pageRepository)
    {
        $this->pageRepo = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.page.index',
            ['pages' => $this->pageRepo->listPages('id', 'asc')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        $this->pageRepo->createPage($request->all());

        $request->session()->flash('message', 'Create successful');
        return redirect()->route('admin.page.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('admin.page.edit', ['page' => $this->pageRepo->findPageById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * * @param  UpdatePageRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $page = $this->pageRepo->findPageById($id);

        $update = new PageRepository($page);
        $update->updatePage($request->all());

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.page.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $this->pageRepo->delete($id);

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.page.index');
    }
}
