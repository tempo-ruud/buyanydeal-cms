<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 07/06/2018
 * Time: 09:15
 */

namespace App\Cms\Brands\Requests;

use App\Cms\Base\Requests\FormRequest;

class CreateBrandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cover' => ['file', 'image:png,jpeg,jpg,gif'],
            'logo' => ['file', 'image:png,jpeg,jpg,gif'],
            'meta_description' => 'required',
            'meta_title' => 'required',
            'name' => 'required|unique:brands|max:255',
            'slug' => 'required',
            'status' => 'required|boolean'
        ];
    }
}