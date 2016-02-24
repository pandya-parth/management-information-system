<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\Company;
use App\Project;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('shared.left_sidebar', function($view)
        {
            $view->with('companies', Company::all());
            $view->with('current_user', Auth::user());
            $view->with('projects', Project::all());
        });

        // View::composer('*', function($view)
        // {
        //     $view->with('current_user', Auth::user());
        // });



    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
