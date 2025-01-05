<?php

namespace App\Providers;
use Illuminate\Support\Facades\Mail;
use App\Mail\testMail;
use App\Models\User;
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
       User::created(function($user){
       mail::to($user)->send(new testMail($user));
       });
       User::updated(function($user){
       mail::to($user)->send(new testMail($user));
       });
    }
}
