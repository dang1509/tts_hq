<?php

namespace Tests\Feature;

use App\Infrastructure\Persistence\Models\User as ModelsUser;
use App\Mail\VerifyAccountMail;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotPasswordTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function user_can_request_password_reset_link()
    {
        Mail::fake();
        $user = ModelsUser::where('email', 'danglmph48331@fpt.edu.vn')->first();

        // Gửi request
        $response = $this->post(route('user.forgot.password.check'), [
            'email' => 'danglmph48331@fpt.edu.vn'
        ]);
        // Kiểm tra DB đã có token
        $this->assertDatabaseHas('user_verification_tokens', [
            'user_id' => $user->id
        ]);

        // Kiểm tra view
        $response->assertRedirect(route('user.email.send'));
    }

    /** @test */
    public function it_throws_exception_when_email_does_not_exist()
    {
        $response = $this->from(route('user.forgot.password'))
                         ->post(route('user.forgot.password'), [
                             'email' => 'notfound@example.com'
                         ]);

        $response->assertSessionHasErrors(); // Tuỳ chỉnh nếu bạn dùng try-catch
    }
}
