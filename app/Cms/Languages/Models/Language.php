<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Languages\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lang', 'iso', 'name', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
