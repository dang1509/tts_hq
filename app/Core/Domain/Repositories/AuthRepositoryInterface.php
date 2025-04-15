<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\DTO\BaseResponse;

interface AuthRepositoryInterface
{
    public function register(UserEntity $data): UserEntity;
    public function login($username, $password);
    public function login_with_google(string $token) : BaseResponse;
}