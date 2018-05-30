<?php

namespace App\Providers;

use App\Cms\Cms\Models\CmsPage;
use App\Cms\Cms\Repositories\PageRepository;

/**
 * Class GlobalTemplateServiceProvider
 * @package App\Providers
 * @codeCoverageIgnore
 */
class GlobalTemplateServiceProvider extends ServiceProvider
{

    /**
     * Get all the categories
     *
     */
    private function getPages()
    {
        $pageRepo = new PageRepository(new Page);
        return $pageRepo->listPages('name', 'asc', 1)->whereIn('parent_id', [1]);
    }
}