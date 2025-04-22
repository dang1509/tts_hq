<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\Repositories\MailRepositoryInterFace;
use App\Core\Domain\Repositories\OtpRepositoryInterface;
use App\Core\Domain\UseCase\MailUseCase;
use App\Core\Domain\UseCase\OtpUseCase;
use App\Infrastructure\Persistence\Models\Email;
use App\Infrastructure\Persistence\Models\Otp;
use App\Mail\SendOtp;
use App\Mail\VerifyAccountMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MailRepository implements MailRepositoryInterFace
{
    protected MailUseCase $mailUseCase;
    public function __construct(MailUseCase $mailUseCase)
    {
        $this->mailUseCase = $mailUseCase;
    }
    public function sendMail($email)
    {
        try {
            // Gửi email
            Mail::to($email)->send(new VerifyAccountMail($email));
    
            // Ghi log vào bảng emails
            Email::create([
                'to_email' => $email,
                'subject' => 'Xác nhận email',
                'body' => 'Link xác nhận đã được gửi.',
                'type' => 'verification',
                'sent_at' => now(),
            ]);
    
            return $email;
    
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}