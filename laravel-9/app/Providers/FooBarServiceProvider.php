<?php

namespace App\Providers;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloServices;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FooBarServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        HelloServices::class => HelloServices::class,
    ];

    public function register()
    {
        //echo "Foo bar service provider test provides"; //TEST Provides
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
        $this->app->singleton(Bar::class, function ($app) {
            return new Bar($app->make(Foo::class));
        });
    }

    public function boot()
    {
        //
    }
    public function provides()
    {
        return [HelloServices::class, Foo::class, Bar::class];
    }
}
