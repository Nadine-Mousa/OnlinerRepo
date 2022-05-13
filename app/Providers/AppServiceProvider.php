<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;
use App\Models\Navbar;


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
        Paginator::useBootstrap();
 
        View::composer('*', function($view)
        {
            $navbars = Navbar::orderBy('ordering')->get();
            $departmentsIndexNavbar = Navbar::where('name', 'departments.index')->first();
            $homeNavbar = Navbar::where('name', 'home')->first();
            $view->with('navbars', $navbars);
            $view->with('homeNavbar', $homeNavbar);
            $view->with('departmentsIndexNavbar', $departmentsIndexNavbar);
            $user = session()->get('user');
            $view->with('user', $user);
        });
    }
}
