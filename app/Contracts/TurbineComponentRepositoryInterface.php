<?php

namespace App\Contracts;

interface TurbineComponentRepositoryInterface extends BaseRepositoryInterface
{
    public function getRelatedTurbine(int $turbineId): object;

    public function getComponentType(int $turbineComponentId): object;

}
