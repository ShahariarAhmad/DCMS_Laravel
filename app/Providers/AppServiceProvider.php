<?php

namespace App\Providers;

use App\interfaces\DietInterface;
use App\Models\Chamber;
use App\Models\Social_media;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


use App\Models\Blog;
use App\Models\User;
use App\Repositories\DietRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( DietInterface::class, DietRepository::class );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



        Gate::define('isAdmin', function (User $user) {

            if ($user->role_id === 1) {
                return true;
            } else {
                return false;
            }
         
        });


        Gate::define('isModerator', function (User $user) {

            if ($user->role_id === 2) {
                return true;
            } else {
                return false;
            }
    
        });

        Gate::define('isPatient', function (User $user) {

            if ($user->role_id === 3) {
                return true;
            } else {
                return false;
            };
  
        });

        Gate::define('isWriter', function (User $user) {

            if ($user->role_id === 4) {
                return true;
            } else {
                return false;
            }
 
        });

        Gate::define('isAuthor', function (User $user) {
            $blog = Blog::find(Auth::id());
            if ($user->id == $blog['user_id'] ) {
                return true;
            } 
 
        });










        Paginator::useBootstrap();

        View::composer(
            [
                'layouts.frontend.pages.about',
                'layouts.frontend.pages.article_template',
                'layouts.frontend.pages.blog',
                'layouts.frontend.pages.contact',
                'layouts.frontend.pages.gallery',
                'layouts.frontend.pages.home',
                'layouts.frontend.pages.login_register',
                'auth.login',
                'layouts.backend.other.appointment'
            ],
            function ($view) {
                $social = Social_media::all();
                $chamber = Chamber::limit(3)->get();

                $view->with('social', $social);
                $view->with('chamber', $chamber);
            }
        );
    }
}
