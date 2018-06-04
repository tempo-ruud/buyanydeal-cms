<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Http\Controllers\Admin\Import;


use App\Cms\Imports\Interfaces\ImportRepositoryInterface;
use App\Cms\Imports\Repositories\ImportRepository;
use App\Cms\Imports\Requests\CreateRequest;
use App\Cms\Imports\Requests\UpdateRequest;

use App\Http\Controllers\Controller;

class ImportController extends Controller
{

    private $importRepo;

    /**
     * ImportController constructor.
     * @param ImportRepositoryInterface $importRepository
     */
    public function __construct(ImportRepositoryInterface $importRepository)
    {
        $this->importRepo = $importRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.import.index',
            ['imports' => $this->importRepo->listImports('id', 'asc')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.import.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return Response
     */
    public function store(CreateRequest $request)
    {
        $this->importRepo->createImport($request->all());

        $request->session()->flash('message', 'Create successful');
        return redirect()->route('admin.import.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('admin.import.edit', ['import' => $this->importRepo->findImportById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $import = $this->importRepo->findImportById($id);

        $update = new ImportRepository($import);
        $update->updateImport($request->all());

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.import.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $this->importRepo->delete($id);

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.import.index');
    }
}
