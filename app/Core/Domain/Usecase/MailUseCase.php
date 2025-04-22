<?php

namespace App\Core\Domain\UseCase;

use App\Core\Domain\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\Email;
use App\Infrastructure\Persistence\Models\Otp;
use App\Mail\SendOtp;
use App\Mail\VerifyAccountMail;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailUseCase
{
    public function handle(UserEntity $user)
    {
        try {
            // Gửi email
            Mail::to($user->email)->send(new VerifyAccountMail($user->email));
    
            // Ghi log vào bảng emails
            Email::create([
                'to_email' => $user->email,
                'subject' => 'Xác nhận email',
                'body' => 'Link xác nhận đã được gửi.',
                'type' => 'verification',
                'sent_at' => now(),
            ]);
    
            return $user;
    
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}