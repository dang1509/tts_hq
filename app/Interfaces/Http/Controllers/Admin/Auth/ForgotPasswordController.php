<?php

namespace App\Interfaces\Http\Controllers\Admin\Auth;

use App\Core\Domain\Entities\UserEntity;
use App\Interfaces\Http\Controllers\Controller;
use App\Interfaces\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Core\Application\Services\AuthService;
use App\Core\Application\Services\MailService;
use App\Core\Application\Services\OtpService;
use App\Infrastructure\Persistence\Models\User;
use App\Mail\VerifyAccountMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

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
        return view('admin.auth.passwords.email');
    }
    public function checkForm(ForgotPasswordRequest $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if (!$user) {
            throw new \Exception("Email không tồn tại.");
        }

        // 2. Sinh token và lưu vào bảng user_verification_tokens
        $token = Str::random(64);

        DB::table('user_verification_tokens')->updateOrInsert(
            ['user_id' => $user->id],
            ['token' => $token, 'created_at' => now(), 'updated_at' => now(),'expires_at' => now()->addMinutes(1), ]
        );

        // 3. Tạo link gửi mail
        $url = route('user.reset.password.form', ['token' => $token, 'email' => $user->email]);

        // 4. Gửi mail
        Mail::to($user->email)->send(new VerifyAccountMail($url));
        return view('user.auth.email-sent');
    }
    public function showResetForm(Request $request)
    {

        $token = $request->token;
        $email = $request->email;
    
        $user = User::where('email', $email)->firstOrFail();
    
        $record = DB::table('user_verification_tokens')
            ->where('user_id', $user->id)
            ->where('token', $token)
            ->first();
    
        if (!$record || now()->greaterThan($record->expires_at)) {
            return redirect()->route('user.forgot.password.form')->withErrors(['token' => 'Liên kết đã hết hạn. Vui lòng thử lại.']);
        }
    
        // Nếu hợp lệ thì hiển thị form reset password
        return view('user.auth.reset-password', compact('token', 'email'));
    }
}
