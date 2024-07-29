<?php

namespace App\Providers;

use App\Repositories\Interfaces\OfferRepository;
use App\Services\Classes\OfferService;
use Laravel\Sanctum\Sanctum;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        $this->registerPolicies();

        Gate::before(function ($admin, $ability){
            if(Auth::guard('admins')->check()&& $admin->abilities()->contains($ability)){
                return true;
            }
        });
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        $this->app->bind(OfferRepository::class, \App\Repositories\Classes\OfferRepository::class);
        $this->app->bind(OfferService::class, function ($app) {
            return new OfferService($app->make(OfferRepository::class));
        });
    }
}
