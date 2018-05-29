<?php

namespace App\Providers;

use App\Cms\Languages\Repositories\Repository as LanguageRepository;
use App\Cms\Languages\Interfaces\RepositoryInterface as LanguageRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            LanguageRepositoryInterface::class,
            LanguageRepository::class
        );
    }
}
