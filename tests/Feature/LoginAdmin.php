<?php

namespace Tests\Feature;

use App\Infrastructure\Persistence\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginAdmin extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // use RefreshDatabase;

    public function test_user_can_view_login_form()
    {
        $response = $this->get('admin/login');
        $response->assertStatus(200);
    }

    public function test_user_can_login_with_captcha()
    {


        // Mock session để bypass CAPTCHA
        

        $response = $this->post('admin/login', [
            'username' => 'admin',
            'password' => '123@@123',
            
        ]);
        // Xem thực tế Laravel redirect đi đâu
        
        $response->assertRedirect(route('admin.otp.verify.login.form'));
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {


        // Mock session để bypass CAPTCHA
        session(['captcha_key' => 'mocked-code']);

        // Gửi yêu cầu đăng nhập với thông tin sai
        $response = $this->post('admin/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
            'captcha' => 'mocked-code',
        ]);

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
