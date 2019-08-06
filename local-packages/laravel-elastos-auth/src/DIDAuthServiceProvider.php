<?php
/**
 * Created by PhpStorm.
 * User: compy
 * Date: 2019-08-04
 * Time: 07:01
 */

namespace Compy\LaravelElastosAuth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
class DIDAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'elastos');
    }

    public function register()
    {
    }
}
