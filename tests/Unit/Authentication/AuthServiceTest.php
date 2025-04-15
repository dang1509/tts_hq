<?php 
namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Core\Application\Services\AuthService;
use App\Core\Domain\Repositories\AuthRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;

class AuthServiceTest extends TestCase
{
    use DatabaseTransactions; // Dùng transaction để không xóa dữ liệu

    protected $authRepositoryMock;
    protected $authService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authRepositoryMock = Mockery::mock(AuthRepositoryInterface::class);
        $this->authService = new AuthService($this->authRepositoryMock);
    }

    /** @test */
    public function it_should_register_a_user_successfully()
    {
        $userData = [
            'id' => null,
            'shop_id' => null,
            'username' => 'testuser',
            'fullname' => 'Test User',
            'account_type' => 1,
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'),
            'balance' => 0,
        ];

        $userEntity = new UserEntity($userData);

        $this->authRepositoryMock
            ->shouldReceive('register')
            ->once()
            ->andReturn($userEntity);

        $result = $this->authService->register($userEntity);

        $this->assertInstanceOf(UserEntity::class, $result);
        $this->assertEquals($userEntity->username, $result->username);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
