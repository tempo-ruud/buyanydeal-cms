<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Http\Controllers\Admin\Language;


use App\Cms\Languages\Interfaces\RepositoryInterface;
use App\Cms\Languages\Repositories\Repository;
use App\Cms\Languages\Requests\CreateRequest;
use App\Cms\Languages\Requests\UpdateRequest;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{

    private $languageRepo;

    /**
     * LanguageController constructor.
     * @param RepositoryInterface $languageRepository
     */
    public function __construct(RepositoryInterface $languageRepository)
    {
        $this->languageRepo = $languageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.language.index',
            ['languages' => $this->languageRepo->listLanguages('id', 'asc')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateRequest $request)
    {
        $this->languageRepo->createLanguage($request->all());

        $request->session()->flash('message', 'Create successful');
        return redirect()->route('admin.language.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return view('admin.language.edit', ['language' => $this->languageRepo->findLanguageById($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * * @param  UpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $language = $this->languageRepo->findLanguageById($id);

        $update = new Repository($language);
        $update->updateLanguage($request->all());

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.language.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $this->languageRepo->delete($id);

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.language.index');
    }
}
