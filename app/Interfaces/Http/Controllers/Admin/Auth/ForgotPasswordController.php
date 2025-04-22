<?php

namespace App\Interfaces\Http\Controllers\Admin\Auth;

use App\Core\Domain\Entities\UserEntity;
use App\Interfaces\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Core\Application\Services\AuthService;
use App\Core\Application\Services\OtpService;

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
    public function __construct(
        OtpService $OtpService
    ) {
        $this->OtpService = $OtpService;
        $this->middleware('guest');
    }

    public function showFormForgot(){
         return view('admin.auth.passwords.email');
    }
    public function checkForm(ForgotPasswordRequest $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
         
        $email = $request->email;
        $status = "reset";
        $this->OtpService->sendOtp($email, $status);
        session(['otp_user_email' => $email]);
        return redirect()->route("admin.otp.verify.form")->with("success", "Một mã OTP đã được gửi tới email của bạn");

    }
}
