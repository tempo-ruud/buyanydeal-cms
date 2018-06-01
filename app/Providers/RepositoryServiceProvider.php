<?php

namespace App\Providers;

use App\Cms\Catalog\Repositories\CategoryRepository as CategoryRepository;
use App\Cms\Catalog\Interfaces\RepositoryInterface as CategoryRepositoryInterface;
use App\Cms\Cms\Repositories\PageRepository as CmsRepository;
use App\Cms\Cms\Interfaces\RepositoryInterface as CmsRepositoryInterface;
use App\Cms\Languages\Repositories\Repository as LanguageRepository;
use App\Cms\Languages\Interfaces\RepositoryInterface as LanguageRepositoryInterface;
use App\Cms\Catalog\Repositories\ProductRepository as ProductRepository;
use App\Cms\Catalog\Interfaces\ProductRepositoryInterface as ProductRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
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
    }
}
