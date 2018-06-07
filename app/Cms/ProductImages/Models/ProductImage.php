<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 06/06/2018
 * Time: 07:28
 */

namespace App\Cms\ProductImages\Models;

use App\Cms\Products\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'src'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}