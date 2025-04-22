<?php

namespace App\Core\Domain\UseCase;

use App\Core\Domain\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\Otp;
use App\Mail\SendOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OtpUseCase
{
    public function handle(UserEntity $user)
    {
        try {
            $otp = Str::random(6); // Mã OTP 6 ký tự
            $otpExpiresAt = now()->addMinutes(2); // OTP hết hạn sau 2 phút

            // Lưu OTP vào bảng otps
            Otp::create([
                'user_id' => $user->id,
                'code' => $otp,               
                'expires_at' => $otpExpiresAt,
            ]);

            // Gửi email chứa OTP
            Mail::to($user->email)->send(new SendOtp($user, $otp));
            return $user;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}