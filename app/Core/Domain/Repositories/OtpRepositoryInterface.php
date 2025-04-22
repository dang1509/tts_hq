<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\UserEntity;

interface OtpRepositoryInterface
{
    public function sendOtp($email, $status);
}