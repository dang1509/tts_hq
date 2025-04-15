<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\UserEntity;

interface UserRepositoryInterface
{
    public function getAll(): array;
    public function getById(int $id): ?UserEntity;
    public function create(UserEntity $user): UserEntity;
    public function update(UserEntity $user): UserEntity;
    public function delete(int $id): bool;
}