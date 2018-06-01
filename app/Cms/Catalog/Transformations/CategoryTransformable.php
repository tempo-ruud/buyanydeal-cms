<?php

namespace App\Cms\Catalog\Transformations;

use App\Cms\Catalog\Models\Category;

use Illuminate\Support\Facades\Storage;

trait CategoryTransformable
{
    /**
     * Transform the product
     *
     * @param Category $category
     * @return Category
     */
    protected function transformCategory(Category $category)
    {
        $image_src = Storage::disk('public')->exists($category->image_src) ? $category->image_src : null;
        $thumbnail_src = Storage::disk('public')->exists($category->thumbnail_src) ? $category->thumbnail_src : null;
        $icon_src = Storage::disk('public')->exists($category->icon_src) ? $category->icon_src : null;

        $cat = new Category;
        $cat->id                = (int) $category->id;
        $cat->name              = $category->name;
        $cat->content           = $category->content;
        $cat->image_src         = $image_src;
        $cat->thumbnail_src     = $thumbnail_src;
        $cat->icon_src          = $icon_src;
        $cat->meta_title        = $category->meta_title;
        $cat->meta_description  = $category->meta_description;
        $cat->meta_keywords     = $category->meta_keywords;
        $cat->slug              = $category->slug;
        $cat->parent_id         = $category->parent_id;
        $cat->sort_order        = $category->sort_order;
        $cat->is_active         = $category->is_active;

        return $cat;
    }
}
