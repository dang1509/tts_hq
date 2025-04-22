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
use Illuminate\Support\Facades\DB;

class ForgotPasswordTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function user_can_request_password_reset_link()
    {
        Mail::fake();

    // Xoá user và token nếu đã tồn tại
    DB::table('user_verification_tokens')->whereExists(function ($query) {
        $query->select(DB::raw(1))
              ->from('users')
              ->whereColumn('users.id', 'user_verification_tokens.user_id')
              ->where('email', 'danglmph48331@fpt.edu.vn');
    })->delete();

    DB::table('users')->where('email', 'danglmph48331@fpt.edu.vn')->delete();

    // Tạo user test
    $user = new ModelsUser();
    $user->username = 'Test User';
    $user->email = 'danglmph48331@fpt.edu.vn';
    $user->password = bcrypt('12345678');
    $user->account_type = 1;
    $user->save();

    // Gửi request forgot password
    $response = $this->post(route('user.forgot.password.check'), [
        'email' => $user->email,
    ]);

    // Kiểm tra token trong DB
    $this->assertDatabaseHas('user_verification_tokens', [
        'user_id' => $user->id,
    ]);

    // Kiểm tra đã gửi mail với URL đúng định dạng
    Mail::assertSent(function ($mail) use ($user) {
        return $mail->hasTo($user->email)
            && str_contains($mail->url, route('user.reset.password.form', [
                'token' => '', // chỉ kiểm tra phần đầu của URL
                'email' => $user->email
            ], false)); // false để trả về relative URL (không có domain)
    });

    // Kiểm tra trả về view đúng
    $response->assertViewIs('user.auth.email-sent');
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
