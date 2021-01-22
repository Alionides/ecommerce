<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use TCG\Voyager\Facades\Voyager;
use App\Actions\Voyager\ProductsXmlAction;

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
        //Paginator::useBootstrap('vendor.pagination.custom');
        Paginator::defaultView('vendor.pagination.custom');

        Paginator::defaultSimpleView('vendor.pagination.custom');

        Voyager::addAction(ProductsXmlAction::class);
    }
}
