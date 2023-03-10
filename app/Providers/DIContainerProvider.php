<?php

namespace App\Providers;

use App\Modules\Users\Interfaces\UserRepository;
use App\Modules\Users\Interfaces\UserService;
use App\Modules\Users\Repositories\UserRepositoryImpl;
use App\Modules\Users\Services\UserServiceImpl;
use Illuminate\Support\ServiceProvider;

class DIContainerProvider extends ServiceProvider
{

    public $singletons = [
        UserRepository::class => UserRepositoryImpl::class,
        UserService::class => UserServiceImpl::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
