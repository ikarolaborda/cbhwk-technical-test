<?php

namespace App\Contracts;

interface TurbineRepositoryInterface extends BaseRepositoryInterface
{
    public function getTurbineComponents(int $turbineId): iterable;
}
