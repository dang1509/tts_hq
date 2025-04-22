<?php

namespace App\Providers;

// use App\Core\Application\Services\OtpService;

use App\Core\Domain\Repositories\MailRepositoryInterFace;
use App\Core\Domain\Repositories\OtpRepositoryInterface;
use App\Core\Domain\Repositories\UserRepositoryInterface;
use App\Core\Domain\Repositories\VerificationTokenRepositoryInterface;
use App\Infrastructure\Repositories\MailRepository;
use App\Infrastructure\Repositories\OtpRepositories;
use App\Infrastructure\Repositories\VerificationTokenRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OtpRepositoryInterface::class, OtpRepositories::class);
        $this->app->bind(MailRepositoryInterFace::class, MailRepository::class);

        $this->app->bind(VerificationTokenRepositoryInterface::class, VerificationTokenRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
