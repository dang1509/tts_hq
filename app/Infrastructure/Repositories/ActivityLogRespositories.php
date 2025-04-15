<?php

namespace App\Infrastructure\Repositories;

use App\Core\Domain\Repositories\ActivityLogRepositoryInterface;
use App\Core\Domain\Entities\ActivityLogEntity;
use App\Infrastructure\Persistence\Models\ActivityLog;
use App\Core\Domain\Exceptions\BaseException;
use App\Core\Domain\DTO\BaseResponse;

class ActivityLogRespositories implements ActivityLogRepositoryInterface
{
    public function __construct()
    {
       
    }

    public function add($content) : ActivityLogEntity
    {
        $log = ActivityLog::add($content);
        return new ActivityLogEntity($log->toArray());
    }
}