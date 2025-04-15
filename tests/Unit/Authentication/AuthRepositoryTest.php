<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Infrastructure\Repositories\AuthRepository;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Infrastructure\Persistence\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;

class AuthRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    protected AuthRepository $authRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authRepository = new AuthRepository();
    }
    /** @test */
    public function it_should_store_user_in_database()
    {
        $userData = [
            'shop_id' => null,
            'username' => 'testuser',
            'fullname' => 'Test User',
            'account_type' => 1,
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'balance' => 0,
        ];

        $userEntity = new UserEntity($userData);

        $storedUser = $this->authRepository->register($userEntity);

        $this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
        $this->assertInstanceOf(UserEntity::class, $storedUser);
        $this->assertEquals('testuser', $storedUser->username);
    }
}
