<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Http\Controllers\Front\Cms;

use App\Cms\Cms\Interfaces\RepositoryInterface;
use App\Cms\Cms\Models\CmsPage;
use App\Cms\Cms\Repositories\PageRepository;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private $pageRepo;

    public function __construct(RepositoryInterface $pageRepository)
    {
        $this->pageRepo = $pageRepository;
    }

    /**
     * Find the category via the slug
     *
     * @param string $slug
     * @return \App\Cms\Cms\Models\CmsPage
     */
    public function getCms(string $slug)
    {

        $page = $this->pageRepo->findPageBySlug(['slug' => $slug]);

        return view('front.cms.page', [
            'page' => $page
        ]);
    }
}