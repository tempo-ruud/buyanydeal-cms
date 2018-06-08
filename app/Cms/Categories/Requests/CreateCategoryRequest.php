<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 07/06/2018
 * Time: 09:15
 */

namespace App\Cms\Categories\Requests;

use App\Cms\Base\Requests\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:categories']
        ];
    }
}