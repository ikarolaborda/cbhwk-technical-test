<?php

namespace App\Services;

use App\Contracts\BaseRepositoryInterface;

abstract class BaseService
{

    public function __construct(
        BaseRepositoryInterface $repository
    )
    {
    }

    public function getAll(array $columns = ['*']): iterable
    {
        return $this->repository->all($columns);
    }

    public function getById(int $id, array $columns = ['*']): ?object
    {
        return $this->repository->find($id, $columns);
    }

    public function create(array $attributes): object
    {
        return $this->repository->create($attributes);
    }

    public function update(int $id, array $attributes): object | bool
    {
        return $this->repository->update($id, $attributes);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

}
