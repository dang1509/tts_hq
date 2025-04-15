<?php

namespace App\Core\Application\Services;
use App\Core\Domain\Entities\ActivityLogEntity;
use App\Core\Domain\DTO\BaseResponse;
use App\Core\Domain\Repositories\ActivityLogRepositoryInterface;
class ActivityLogService
{

    protected ActivityLogRepositoryInterface $activityLogRepository;

    public function __construct(ActivityLogRepositoryInterface $activityLogRepository)
    {
       $this->activityLogRepository = $activityLogRepository;
    }

    public function add($content): ActivityLogEntity
    {
        return $this->activityLogRepository->add($content);
    }
}