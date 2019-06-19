<?php

namespace InnotecScotlandLtd\Graydon\Providers;

use Illuminate\Support\ServiceProvider;


class GraydonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish your migrations
        $this->publishes([
            __DIR__.'/../migrations/graydon.php' => base_path('/database/migrations/2019_06_18_141101_create_graydon_events_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../config' => base_path('config'),
        ]);
    }

    public function register()
    {

    }
}