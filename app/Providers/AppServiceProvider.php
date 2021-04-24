<?php

namespace App\Providers;

use App\Models\Pages;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Carbon::setLocale('id');
        $admin_theme = config('app.setting.backend.theme');
        View::addNamespace('admin', resource_path("views/admin/{$admin_theme}"));
        $this->loadViewsFrom(resource_path("views/admin/$admin_theme"), 'backend');

        $public_theme = config('app.setting.frontend.theme');
        View::addNamespace('public', resource_path("views/public/{$public_theme}"));

        Blade::component('components.alert', 'alert');

        Paginator::useBootstrap();

        $listpages = Pages::select('title', 'slug', 'content', 'image', 'published')->get();

        View::share('listpages', $listpages);
        // register define gates from config
        // foreach (config('admin.gates') as $name => $views) {
        //     if (is_array($views)) {
        //         foreach ($views as $act => $function) {
        //             Gate::define("{$name}.{$act}", $function);
        //         }
        //     }
        // }
    }
}
