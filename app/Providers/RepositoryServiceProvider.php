<?php

namespace App\Providers;

use App\Cms\Brands\Repositories\BrandRepository;
use App\Cms\Brands\Interfaces\BrandRepositoryInterface;
use App\Cms\Categories\Repositories\CategoryRepository;
use App\Cms\Categories\Interfaces\CategoryRepositoryInterface;
use App\Cms\Products\Repositories\ProductRepository;
use App\Cms\Products\Interfaces\ProductRepositoryInterface;
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
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            ShopRepositoryInterface::class,
            ShopRepository::class
        );
    }
}
