<?php

namespace App\Core\Domain\Repositories;
use App\Core\Domain\Entities\ActivityLogEntity;
interface ActivityLogRepositoryInterface
{
    public function add($content): ActivityLogEntity;
}