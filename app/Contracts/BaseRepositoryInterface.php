<?php

namespace App\Contracts;

interface BaseRepositoryInterface
{
    public function all(array $columns = ['*']): iterable;

    public function find(int $id, array $columns = ['*']): ?object;

    public function create(array $attributes): object | bool;

    public function update(int $id, array $attributes): object | bool;

    public function delete(int $id): bool | int;
}
