<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\Repositories\OtpRepositoryInterface;
use App\Core\Domain\UseCase\OtpUseCase;
use App\Infrastructure\Persistence\Models\Otp;
use App\Mail\SendOtp;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OtpRepositories implements OtpRepositoryInterface
{
    protected OtpUseCase $otpUseCase;
    public function __construct(OtpUseCase $otpUseCase)
    {
        $this->otpUseCase = $otpUseCase;
    }
    public function sendOtp($email, $status)
    {
        $otp = Str::random(6); // Mã OTP 6 ký tự
        $otpExpiresAt = now()->addMinutes(2); // OTP hết hạn sau 2 phút

        // Lưu OTP vào bảng otps
        Otp::create([
            'email' => $email,
            'code' => $otp,
            'status' => $status,
            'expires_at' => $otpExpiresAt,
        ]);

        // Gửi email chứa OTP
        Mail::to($email)->send(new SendOtp($email, $otp));
        return true;
    }
}