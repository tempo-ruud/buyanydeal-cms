<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 28/05/2018
 * Time: 06:37
 */

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit');
    }
}