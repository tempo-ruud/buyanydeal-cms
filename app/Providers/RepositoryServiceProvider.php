<?php

namespace App\Providers;

use App\Cms\Brands\Repositories\BrandRepository;
use App\Cms\Brands\Interfaces\BrandRepositoryInterface;
use App\Cms\Catalog\Repositories\CategoryRepository as CategoryRepository;
use App\Cms\Catalog\Interfaces\RepositoryInterface as CategoryRepositoryInterface;
use App\Cms\Catalog\Repositories\ProductRepository as ProductRepository;
use App\Cms\Catalog\Interfaces\ProductRepositoryInterface as ProductRepositoryInterface;
use App\Cms\Shops\Repositories\ShopRepository;
use App\Cms\Shops\Interfaces\ShopRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app->bind(
            CmsRepositoryInterface::class,
            CmsRepository::class
        );
        $this->app->bind(
            LanguageRepositoryInterface::class,
            LanguageRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            ShopRepositoryInterface::class,
            ShopRepository::class
        );
    }
}
