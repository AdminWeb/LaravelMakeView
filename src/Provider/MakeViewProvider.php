<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/08/16
 * Time: 11:54
 */

namespace LaravelMakeView\Provider;

use LaravelMakeView\Command\MakeViewCommand;
use Illuminate\Support\ServiceProvider;

class MakeViewProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }


    public function register()
    {
        $base = $this->app->basePath();
        $this->app->singleton('make:view', function ($app) use ($base) {
            return new MakeViewCommand($base);
        });

        $this->commands('make:view');
    }
}