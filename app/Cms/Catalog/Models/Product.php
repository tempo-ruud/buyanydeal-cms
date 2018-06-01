<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Catalog\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',
        'content',
        'currency',
        'delivery_cost',
        'delivery_time',
        'is_active',
        'image_src',
        'in_stock',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'name',
        'original_price',
        'sku',
        'slug',
        'special_price',
        'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
