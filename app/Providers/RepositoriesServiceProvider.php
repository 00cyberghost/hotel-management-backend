<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RegisteredUserRepository;
use App\Contracts\RegisteredUserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Contracts\UserRepositoryInterface;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //RegisteredUserRepository
        $this->app->bind(RegisteredUserRepositoryInterface::class, RegisteredUserRepository::class);

        //UserRepository
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        
    }
}
