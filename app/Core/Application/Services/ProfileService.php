<?php

namespace App\Core\Application\Services;
use App\Core\Domain\Repositories\ProfileRepositoryInterface;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\DTO\BaseResponse;

class ProfileService {
    
    protected ProfileRepositoryInterface $profileRepository;


    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
    public function changePassword($data): BaseResponse
    {
        return $this->profileRepository->changePassword($data);
    }
    public function getQr2Fa($data): BaseResponse
    {
        return $this->profileRepository->getQr2Fa($data);
    }
    public function enable2fa($data,$code,$two_factor_recovery_codes): BaseResponse
    {
        return $this->profileRepository->enable2fa($data,$code,$two_factor_recovery_codes);
    }
    public function disable2fa($data,$code): BaseResponse
    {
        return $this->profileRepository->disable2fa($data,$code);
    }
    public function very_2fa($data,$code): BaseResponse
    {
        return $this->profileRepository->very_2fa($data,$code);
    }
}