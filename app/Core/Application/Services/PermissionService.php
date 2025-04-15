<?php

namespace App\Core\Application\Services;
use App\Core\Domain\Entities\PermissionEntity;
use App\Core\Domain\Repositories\PermissionRepositoryInterface;
use App\Core\Domain\DTO\BaseResponse;
use Illuminate\Http\Request;
class PermissionService
{
    protected PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
       $this->permissionRepository = $permissionRepository;
    }


    public function list(Request $request)
    {
        return $this->permissionRepository->list($request);
    }
}