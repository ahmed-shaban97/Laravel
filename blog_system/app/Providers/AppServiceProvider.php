<?php

namespace App\Providers;

use App\Events\UserRegistered;
use Illuminate\Pagination\Paginator;
use App\Listeners\SendWelcomeMessage;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    Paginator::useBootstrap();
    Event::listen(UserRegistered::class, [SendWelcomeMessage::class, 'handle']);
    }
}
