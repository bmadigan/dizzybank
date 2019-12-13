<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
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
        Inertia::share([
            'app' => [
                'name' => Config::get('app.name'),
            ],
            'auth' => function () {
                return [
                    'user' => auth()->user() ? [
                        'id' => auth()->user()->id,
                        'name' => auth()->user()->name,
                        'email' => auth()->user()->email,
                        //'avatar' => gravatar_url(auth()->user()->email),
                        'profile_name' => auth()->user()->profile->profile_name,
                        'address' => auth()->user()->profile->address ? [
                            'street' => auth()->user()->profile->address->street_address,
                            'secondary' => auth()->user()->profile->address->secondary_address,
                            'city' => auth()->user()->profile->address->city,
                            'state' => auth()->user()->profile->address->state,
                            'zip' => auth()->user()->profile->address->zipcode,
                        ] : null,
                    ] : null,
                ];
            },
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                    'error' => Session::get('error'),
                ];
            },
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : null;
            },
        ]);
    }
}
