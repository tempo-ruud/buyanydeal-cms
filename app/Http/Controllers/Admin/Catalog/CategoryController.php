<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 28/05/2018
 * Time: 06:35
 */

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
}