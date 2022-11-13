<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\AccountRepositoryInterface;
use App\Repositories\AccountRepository;

use App\Interfaces\ContactRepositoryInterface;
use App\Repositories\ContactRepository;

use App\Interfaces\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;

use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
