<?php

namespace App\Providers;

use App\Livewire\CareerFilter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        Livewire::component('career-filter', CareerFilter::class);
        Paginator::useBootstrap();
    }
}
