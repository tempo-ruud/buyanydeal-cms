<?php
/**
 * Created by PhpStorm.
 * User: ruudvanengelenhoven
 * Date: 29/05/2018
 * Time: 19:48
 */

namespace App\Cms\Languages\Repositories;

use App\Cms\Base\Repositories\BaseRepository;

use App\Cms\Languages\Exceptions\InvalidArgumentException;
use App\Cms\Languages\Exceptions\NotFoundException;
use App\Cms\Languages\Interfaces\RepositoryInterface;
use App\Cms\Languages\Models\Language;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class Repository extends BaseRepository implements RepositoryInterface
{
    /**
     * OrderStatusRepository constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        parent::__construct($language);
        $this->model = $language;
    }

    /**
     * Create the order status
     *
     * @param array $params
     * @return Language
     * @throws InvalidArgumentException
     */
    public function createLanguage(array $params) : Language
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
     * @param array $update
     * @return Language
     * @throws InvalidArgumentException
     */
    public function updateLanguage(array $params) : Language
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
     * @return Language
     * @throws NotFoundException
     */
    public function findLanguageById(int $id) : Language
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
    public function listLanguages(string $order = 'id', string $sort = 'desc') : Collection
    {
        return $this->model->orderBy($order, $sort)->get();
    }

    /**
     * @param Language $lang
     * @return bool
     */
    public function deleteLanguage(Language $lang) : bool
    {
        return $this->delete($lang->id);
    }

}
