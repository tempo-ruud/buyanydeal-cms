<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Languages\Requests;

use App\Cms\Base\Requests\FormRequest;

class CreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'lang' => 'required',
            'iso' => 'required|unique:languages,iso'
        ];
    }
}