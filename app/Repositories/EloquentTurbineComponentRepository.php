<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use App\Contracts\TurbineComponentRepositoryInterface;
use App\Contracts\TurbineRepositoryInterface;
use App\Models\Turbine;
use App\Models\TurbineComponent;

class EloquentTurbineComponentRepository extends BaseRepository implements TurbineComponentRepositoryInterface
{

    public function __construct(
        protected TurbineComponent $model
    )
    {
        parent::__construct($model);
    }

    public function getRelatedTurbine(int $turbineId): object
    {
        return (new EloquentTurbineRepository(new Turbine()))->find($turbineId);
    }

    public function getComponentType(int $turbineComponentId): object
    {
        return $this->find($turbineComponentId)->componentType;
    }
}
