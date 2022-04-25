<?php

namespace App\Providers;

use App\Http\View\Composers\MenuComposer;
use App\View\Components\AdminLayout;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::component('admin-layout', AdminLayout::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('layouts.partials.admin.sidebar', MenuComposer::class);
        View::composer('page', MenuComposer::class);
    }
}
