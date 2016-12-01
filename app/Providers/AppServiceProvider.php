<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Blog\Models\Article::observe(\App\Blog\Observers\Articles::class);

        \App\Users\Models\User::observe(\App\Users\Observers\Users::class);
        \App\Users\Models\Profile::observe(\App\Users\Observers\Profiles::class);
        \App\Users\Models\Social::observe(\App\Users\Observers\Socials::class);

         Validator::extend('correct_password', function ($attribute, $value, $parameters, $validator) {
            return auth()->once(['email' => $parameters[0], 'password' => $value]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
