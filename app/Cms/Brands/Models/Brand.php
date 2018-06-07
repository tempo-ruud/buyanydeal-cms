<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 07:50
 */

namespace App\Cms\Brands\Models;

use App\Cms\Products\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cover',
        'logo',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}