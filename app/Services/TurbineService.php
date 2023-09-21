<?php

namespace App\Services;

use App\Contracts\TurbineRepositoryInterface;

class TurbineService extends BaseService
{
    public function __construct(
        protected TurbineRepositoryInterface $repository
    )
    {
        parent::__construct($repository);
    }

    public function getAllTurbines(): iterable
    {
        return $this->repository->all();
    }

}

