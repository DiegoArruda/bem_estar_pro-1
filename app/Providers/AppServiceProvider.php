<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin', function(User $user): bool {
            return $user->id == 1;
        });

        Blade::component('admin.components.btn-create', 'btnCreate');
        Blade::component('admin.components.sidebar', 'sidebar');
        Blade::component('admin.components.busca', 'busca');
        Blade::component('admin.components.modal-delete', 'modalDelete');
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
