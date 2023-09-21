<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class EloquentUserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(
        protected User $model)
    {
        parent::__construct($model);
    }

    public function getUserTurbines(int $userId): iterable
    {
        // TODO: Implement getUserTurbines() method.
    }
}
