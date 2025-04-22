<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateUser extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_shows_create_user_form()
     {
        $response = $this->get('/user/register');
        $response->assertStatus(200);
        $response->assertSee('Register');
     }
    /** @test */
    public function test_creates_user_and_redirects()
    {
        // Bỏ qua middleware CSRF cho bài kiểm thử này
        $response = $this->withoutMiddleware()->post('/user/register', [
            'username' => 'dang123123',
            'email' => 'danglmph48331@fpt.edu.vn',
            'password' => 'Sieunhan123@',
            'password_confirmation' => 'Sieunhan123@',
        ]);
        $response->assertRedirect(route('user.otp.verify.form'));
        
    }
    public function test_creates_user_and_redirects_failed()
    {
        // Bỏ qua middleware CSRF cho bài kiểm thử này
        $response = $this->withoutMiddleware()->post('/user/register', [
            'username' => 'dang123123',
            'email' => 'danglmph48331@fpt.edu.vn',
            'password' => 'Sieunhan123@',
            'password_confirmation' => 'Sieunhan123@',
        ]);
        $response->assertRedirect('user/register');
        
    }
}
