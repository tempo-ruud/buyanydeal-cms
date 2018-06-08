<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 07/06/2018
 * Time: 09:15
 */

namespace App\Cms\Shops\Requests;

use App\Cms\Base\Requests\FormRequest;

use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('categories')->ignore(request()->segment(3))]
        ];
    }
}