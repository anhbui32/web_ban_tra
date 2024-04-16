<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Cart;
use App\Models\Category;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        view()->composer('*', function ($view) {
            $cart = new Cart();
            $view->with(compact('cart'));
        });    //=> Written by T.A
        // view()->composer('*', function ($view) {
        //     $category = Category::all();
        //     $view->with(compact('category'));
        // });    //=> Written by T.A
    }
}
