<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Cms\Models;

use App\Cms\Languages\Models\Language;

use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content_heading',
        'content',
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
