<?php

namespace App\Interfaces\Http\Controllers\Admin\Auth;

use App\Infrastructure\Persistence\Models\Otp;
use App\Infrastructure\Persistence\Models\User;
use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyOtpController extends Controller
{
    public function showOtpForm()
    {
        return view('admin.auth.otp');
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $userEmail = session('otp_user_email');
        $user = User::where("email", $userEmail)->first();
        if (!$user) {
            return redirect()->route('admin.register')->withErrors(['otp' => 'Phiên đăng ký không hợp lệ.']);
        }

        // Kiểm tra OTP
        $otp = Otp::where('email', $user->email)
            ->where('code', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if ($otp && $otp->status == "verifi") {
            $user->email_verified_at = now(); 
            $user->save();

            // Xóa OTP sau khi sử dụng
            $otp->delete();

            session()->forget('otp_user_id');
            Auth::loginUsingId($user->id);
            return redirect()->route('admin.login')->with('success', 'Tài khoản đã được kích hoạt! Vui lòng đăng nhập.');
        }
        if ($otp && $otp->status == "reset") {
            // dd($user->email);
            return redirect()->route('admin.password.reset');
        }

        return redirect()->back()->withErrors(['otp' => 'Mã OTP không đúng hoặc đã hết hạn.']);
    }
}