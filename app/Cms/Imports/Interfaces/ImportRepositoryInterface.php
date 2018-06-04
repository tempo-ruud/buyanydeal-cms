<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Imports\Interfaces;

use App\Cms\Imports\Models\Import;

use App\Cms\Base\Interfaces\BaseRepositoryInterface;

use Illuminate\Support\Collection;

interface ImportRepositoryInterface extends BaseRepositoryInterface
{
    public function createImport(array $data) : Import;

    public function updateImport(array $params, int $id) : bool;

    public function findImportById(int $id) : Import;

    public function listImports(string $order = 'id', string $sort = 'asc') : Collection;

    public function deleteImport(Import $import) : bool;

}
