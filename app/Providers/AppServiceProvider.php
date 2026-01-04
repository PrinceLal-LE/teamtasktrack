<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use App\Services\FilamentAuthResponse;
use Filament\Auth\Http\Responses\Contracts\LoginResponse as ContractsLoginResponse;
use App\Listeners\ResetRedirectAfterLogin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 
        $this->app->bind(ResetRedirectAfterLogin::class);
        // $this->app->singleton(ContractsLoginResponse::class, FilamentAuthResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Gate::policy(Team::class, TeamPolicy::class);

        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Admin')) {
                return true;
            }
        });
    }
}
