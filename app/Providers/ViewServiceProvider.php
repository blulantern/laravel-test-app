<?php

namespace App\Providers;

use App\Interfaces\ContactRepositoryInterface;
use App\Repositories\ContactRepository;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class ViewServiceProvider extends ServiceProvider
{
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
        Inertia::share('contactCount', function(ContactRepositoryInterface $contactReporitory ) {
            return $contactReporitory->getAll()->count();
        }
        );
    }
}
