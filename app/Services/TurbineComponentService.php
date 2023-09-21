<?php

namespace App\Services;

use App\Contracts\TurbineComponentRepositoryInterface;

class TurbineComponentService extends BaseService
{
    public function __construct(
        private readonly TurbineComponentRepositoryInterface $turbineComponentRepository
    )
    {
        parent::__construct($turbineComponentRepository);
    }

    public function getRelatedTurbine(int $turbineId): object
    {
        return $this->turbineComponentRepository->getRelatedTurbine($turbineId);
    }

    public function getComponentType(int $turbineComponentId): object
    {
        return $this->turbineComponentRepository->getComponentType($turbineComponentId);
    }

}
