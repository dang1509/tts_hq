<?php

namespace App\Core\Application\Services;

use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\Repositories\OtpRepositoryInterface;


class OtpService
{
    protected OtpRepositoryInterface $otp;
    public function __construct(OtpRepositoryInterface $otp)
    {
        $this->otp = $otp;
    }

    public function sendOtp($email, $status)
    {
        return $this->otp->sendOtp($email, $status);
    }
}