<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Domain\Repositories\UserRepositoryInterface;
use App\Core\Domain\Repositories\AuthRepositoryInterface;
use App\Core\Domain\Repositories\ProfileRepositoryInterface;
use App\Core\Domain\Repositories\ActivityLogRepositoryInterface;
use App\Core\Domain\Repositories\PermissionRepositoryInterface;
use App\Infrastructure\Repositories\ActivityLogRespositories;
use App\Infrastructure\Repositories\AuthRepositories;
use App\Infrastructure\Repositories\ProfileRepositories;
use App\Infrastructure\Repositories\PermissionRepositories;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepositories::class);
        $this->app->bind(ProfileRepositoryInterface::class, ProfileRepositories::class);
        $this->app->bind(ActivityLogRepositoryInterface::class, ActivityLogRespositories::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepositories::class);
    }

    public function boot()
    {
        //
    }
}
