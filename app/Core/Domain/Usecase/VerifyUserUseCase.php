<?php 

namespace App\Core\Domain\Usecase;

use App\Core\Domain\Repositories\UserRepositoryInterface;
use App\Core\Domain\Repositories\VerificationTokenRepositoryInterface;

class VerifyUserUsecase{
    public function __construct(
        protected VerificationTokenRepositoryInterface $tokenRepo,
        protected UserRepositoryInterface $userRepo
    ) {}

    public function execute(string $token): bool
    {
        $record = $this->tokenRepo->findByToken($token);

        if (!$record) return false;

        $this->userRepo->activate($record->user_id);
        $this->tokenRepo->deleteByUserId($record->user_id);
        return true;
    }
}