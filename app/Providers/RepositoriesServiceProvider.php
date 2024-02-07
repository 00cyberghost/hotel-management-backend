<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RegisteredUserRepository;
use App\Contracts\RegisteredUserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\RoomRepository;
use App\Contracts\RoomRepositoryInterface;
use App\Repositories\ImageRepository;
use App\Contracts\ImageRepositoryInterface;

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

        //RoomRepository
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);

        //ImageRepository
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        
    }
}
