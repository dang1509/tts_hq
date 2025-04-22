<?php

namespace App\Interfaces\Http\Controllers\User\Auth;

use App\Core\Domain\Entities\UserEntity;
use App\Interfaces\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Core\Application\Services\AuthService;
use App\Core\Application\Services\MailService;
use App\Core\Application\Services\OtpService;
use App\Infrastructure\Persistence\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use App\Mail\VerifyAccountMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    protected AuthService $authService;
    protected OtpService $OtpService;

    protected MailService $mailService;
    public function __construct(
        OtpService $OtpService,
        MailService $mailService
    ) {
        $this->OtpService = $OtpService;
        $this->mailService = $mailService;
        $this->middleware('guest');
    }

    public function showFormForgot()
    {
        return view('user.auth.passwords.email');
    }
    public function checkForm(ForgotPasswordRequest $request)
    {
        // $request->validate([
        //     'email' => 'required|email|exists:users,email',
        // ]);

        // $email = $request->email;

        // $this->mailService->sendMail($email);

        // return view("user.auth.email-sent");
        // 1. Kiểm tra người dùng
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new \Exception("Email không tồn tại.");
        }

        // 2. Sinh token và lưu vào bảng user_verification_tokens
        $token = Str::random(64);

        DB::table('user_verification_tokens')->updateOrInsert(
            ['user_id' => $user->id],
            ['token' => $token, 'created_at' => now(), 'updated_at' => now()]
        );

        // 3. Tạo link gửi mail
        $url = route('user.reset.password.form', ['token' => $token, 'email' => $user->email]);

        // 4. Gửi mail
        Mail::to($user->email)->send(new VerifyAccountMail($url));
        return view('user.auth.sent-password');
    }

    public function showResetForm(Request $request)
    {

        $email = $request->query('email');
        $token = $request->query('token');

        return view('user.auth.passwords.reset', compact('email', 'token'));
    }
}
