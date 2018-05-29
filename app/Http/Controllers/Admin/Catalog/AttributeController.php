<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 28/05/2018
 * Time: 06:36
 */

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function index()
    {
        return view('admin.attribute.index');
    }
}
