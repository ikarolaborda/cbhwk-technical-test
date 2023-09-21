<?php

namespace App\Contracts;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getUserTurbines(int $userId): iterable;

}
