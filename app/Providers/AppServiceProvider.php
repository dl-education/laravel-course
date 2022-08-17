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
        //$this->app->bind(\App\Services\Sms\SmsSenderInterface::class, \App\Services\Sms\LogsStub::class);
        $this->app->bind(\App\Services\Sms\SmsSenderInterface::class, \App\Services\Sms\SMSAero::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
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
