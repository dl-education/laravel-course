<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
       /*  DB::beforeExecuting(function($sql, $params){
            ob_start();
            echo  "<pre>";
            print_r($sql);
            print_r($params);
            echo "</pre>";
            $log = ob_get_clean();
            file_put_contents('1.log', $log . "\n\n", FILE_APPEND);
        }); */
    }
}
