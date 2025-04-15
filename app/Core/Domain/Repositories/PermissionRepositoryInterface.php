<?php

namespace App\Core\Domain\Repositories;

use App\Core\Domain\Entities\PermissionEntity;
use App\Core\Domain\DTO\BaseResponse;
use Illuminate\Http\Request;

interface PermissionRepositoryInterface
{
    public function list(Request $request);
}