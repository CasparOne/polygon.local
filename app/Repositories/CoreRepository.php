<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreRepository
 *
 * @package App\Repositories
 *
 * Repository for a work with entity
 * Can return data sets
 * Can't create or change entities
 */
abstract class CoreRepository
{
    /**
     * @var $model Model
     */
    protected $model;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return Model|\Illuminate\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();
}
