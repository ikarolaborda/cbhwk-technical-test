<?php

namespace App\Repositories;

use App\Contracts\TurbineRepositoryInterface;
use App\Models\Turbine;
use Illuminate\Database\Eloquent\Collection;

class EloquentTurbineRepository extends BaseRepository implements TurbineRepositoryInterface
{

    public function __construct(
        protected Turbine $model)
    {
    }

    public function getTurbineComponents(int $turbineId): iterable
    {
        // TODO: Implement getTurbineComponents() method.
    }
}

