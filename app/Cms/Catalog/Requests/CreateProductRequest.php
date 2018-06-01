<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Catalog\Requests;

use App\Cms\Base\Requests\FormRequest;

class CreateProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sku' => 'required',
            'name' => 'required',
            'currency' => 'required',
            'original_price' => 'required',
            'url' => 'required',
            'image_src' => 'required',
            'delivery_time' => 'required',
            'delivery_cost' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'slug' => 'required',
            'in_stock' => 'required',
            'is_active' => 'required'
        ];
    }
}