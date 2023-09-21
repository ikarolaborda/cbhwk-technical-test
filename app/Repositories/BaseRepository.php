<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{

    public function __construct(
        Model $model
    )
    {
    }

    public function all(array $columns = ['*']): iterable
    {
        return $this->model->all();
    }

    public function find($id, array $columns = ['*']): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $attributes): object | bool
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes): bool | object
    {
        $record = $this->find($id);
        $record->update($attributes);
        return $record;
    }

    public function delete($id): bool | int
    {
        return $this->model->destroy($id);
    }

}
