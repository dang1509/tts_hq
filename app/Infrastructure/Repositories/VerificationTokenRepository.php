<?php 

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Repositories\VerificationTokenRepositoryInterface;
use Illuminate\Support\Facades\DB;

class VerificationTokenRepository implements VerificationTokenRepositoryInterface{
    public function create(int $userId, string $token): void
    {
        DB::table('user_verification_tokens')->insert([
            'user_id'    => $userId,
            'token'      => $token,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function findByToken(string $token): ?object
    {
        return DB::table('user_verification_tokens')->where('token', $token)->first();
    }

    public function deleteByUserId(int $userId): void
    {
        DB::table('user_verification_tokens')->where('user_id', $userId)->delete();
    }
}