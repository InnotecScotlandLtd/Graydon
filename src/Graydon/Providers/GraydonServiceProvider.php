<?php

namespace InnotecScotlandLtd\Graydon\Providers;

use Illuminate\Support\ServiceProvider;


class GraydonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config' => base_path('config'),
        ]);
    }

    public function register()
    {

    }
}