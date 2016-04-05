<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Task;
use App\Company;
use App\Project;
use App\TaskCategory;
use App\ProjectCategory;
use App\Industry;
use App\Milestone;
use App\ProjectUser;
use Carbon\Carbon;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('shared.company_list', function($view)
        {
            $view->with('companies', Company::all());
            $view->with('current_user', Auth::user());
            $view->with('projects', Project::with('users')->get());
        });

        view()->composer('shared.project_list', function($view)
        {
            $view->with('project_categories', ProjectCategory::all());
            $view->with('projects', Project::all());
        });

        view()->composer('shared.industry_list', function($view)
        {
            $view->with('projects', Project::all());
            $view->with('companies', Company::all());
            $view->with('industries', Industry::all());
        });

        view()->composer('shared.project_detail', function($view)
        {
            $view->with('projects', Project::all());
            $view->with('project_categories', ProjectCategory::all());
            $view->with('project_users', ProjectUser::all());
        });

        view()->composer('shared.milestones', function($view)
        {
            $view->with('projects', Project::all());
            $view->with('project_categories', ProjectCategory::all());
            $view->with('milestones', Carbon::now());
        });

        view()->composer('shared.left_sidebar', function($view)
        {
            $view->with('current_user', Auth::user());
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
