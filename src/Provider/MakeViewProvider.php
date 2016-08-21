<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 21/08/16
 * Time: 11:54
 */

namespace Laravel\Provider;

use Illuminate\Support\ServiceProvider;

class MakeViewProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }


    public function register()
    {
        $this->commands(LaravelMakeView\Command\MakeViewCommand::class);
    }
}