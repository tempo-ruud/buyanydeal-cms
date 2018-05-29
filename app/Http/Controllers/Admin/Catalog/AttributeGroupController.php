<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 28/05/2018
 * Time: 06:37
 */

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;

class AttributeGroupController extends Controller
{
    public function index()
    {
        return view('admin.attributegroup.index');
    }
}