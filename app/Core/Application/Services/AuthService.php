<?php

namespace App\Core\Application\Services;
use App\Core\Domain\Repositories\AuthRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\DTO\BaseResponse;

class AuthService {

    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(UserEntity $user): UserEntity
    {
        return $this->authRepository->register($user);
    }

    /**
     * Xử lý đăng nhập
     */
    public function login(string $email, string $password): BaseResponse
    {
        return $this->authRepository->login($email, $password);
    }

    /**
     * Đăng xuất user
     */
    public function logout(): void
    {
        $this->authRepository->logout();
    }

    public function login_with_google(string $token) : BaseResponse
    {
        return $this->authRepository->login_with_google($token);
    }
}