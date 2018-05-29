<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Languages\Interfaces;

use App\Cms\Languages\Models\Language;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;

use Illuminate\Support\Collection;

interface RepositoryInterface extends BaseRepositoryInterface
{
    public function createLanguage(array $orderLanguage) : Language;

    public function updateLanguage(array $update) : Language;

    public function findLanguageById(int $id) : Language;

    public function listLanguages(string $order = 'id', string $sort = 'asc') : Collection;

    public function deleteLanguage(Language $os) : bool;

}
