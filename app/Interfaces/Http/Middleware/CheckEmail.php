<?php 

namespace App\Interfaces\Http\Middleware;

use App\Core\Application\Services\OtpService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEmail {
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function handle(Request $request, Closure $next)
    {
     $user =   Auth::user(); 

    if (empty($user->email_verified_at)) {
        $status = "verifi";
        $this->otpService->sendOtp($user->email, $status);
        session(['otp_user_email' => $user->email]);
        return redirect()->route('admin.otp.verify.form');
    }

    return $next($request); 
    }
}