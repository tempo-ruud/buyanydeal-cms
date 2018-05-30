<?php

namespace App\Providers;

use App\Cms\Cms\Repositories\PageRepository as CmsRepository;
use App\Cms\Cms\Interfaces\RepositoryInterface as CmsRepositoryInterface;
use App\Cms\Languages\Repositories\Repository as LanguageRepository;
use App\Cms\Languages\Interfaces\RepositoryInterface as LanguageRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CmsRepositoryInterface::class,
            CmsRepository::class
        );
        $this->app->bind(
            LanguageRepositoryInterface::class,
            LanguageRepository::class
        );
    }
}
