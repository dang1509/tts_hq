<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\DTO\BaseResponse;

interface ProfileRepositoryInterface
{
    public function changePassword(UserEntity $data) : BaseResponse;
    public function changePassword2(UserEntity $data) : BaseResponse;
    public function getQr2Fa(UserEntity $data) : BaseResponse;
    public function enable2fa(UserEntity $data, $code, $two_factor_recovery_codes) : BaseResponse;
    public function disable2fa(UserEntity $data, $code) : BaseResponse;
    public function very_2fa(UserEntity $data, $code) : BaseResponse;
}