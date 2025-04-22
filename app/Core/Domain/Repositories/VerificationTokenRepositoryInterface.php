<?php 

namespace App\Core\Domain\Repositories;

interface VerificationTokenRepositoryInterface{
    public function create(int $userId, string $token): void;
    public function findByToken(string $token): ?object;
    public function deleteByUserId(int $userId): void;
}