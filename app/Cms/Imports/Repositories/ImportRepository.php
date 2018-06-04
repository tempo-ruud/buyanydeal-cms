<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Imports\Repositories;

use App\Cms\Base\Repositories\BaseRepository;

use App\Cms\Imports\Exceptions\InvalidArgumentException;
use App\Cms\Imports\Exceptions\NotFoundException;
use App\Cms\Imports\Interfaces\ImportRepositoryInterface;
use App\Cms\Imports\Models\Import;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class ImportRepository extends BaseRepository implements ImportRepositoryInterface
{
    /**
     * OrderStatusRepository constructor.
     * @param Import $import
     */
    public function __construct(Import $import)
    {
        parent::__construct($import);
        $this->model = $import;
    }

    /**
     * Create the order status
     *
     * @param array $params
     * @return Import
     * @throws InvalidArgumentException
     */
    public function createImport(array $params) : Import
    {
        try {
            return $this->create($params);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * Update the order status
     *
     * @param array $params
     * @param int $id
     * @return Import
     * @throws InvalidArgumentException
     */
    public function updateImport(array $params, int $id) : bool
    {
        try {
            $this->update($params, $this->model->id);
            return $this->find($this->model->id);
        } catch (QueryException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return Import
     * @throws NotFoundException
     */
    public function findImportById(int $id) : Import
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException($e->getMessage());
        }
    }

    /**
     * @return mixed
     */
    public function listImports(string $order = 'id', string $sort = 'desc') : Collection
    {
        return $this->model->orderBy($order, $sort)->get();
    }

    /**
     * @param Import $import
     * @return bool
     */
    public function deleteImport(Import $import) : bool
    {
        return $this->delete($import->id);
    }

}
