<?php

namespace App\Providers;

use Phirehose;
use App\TwitterStream;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('App\TwitterStream', function ($app) {
           $twitter_access_token = env('TWITTER_ACCESS_TOKEN', '572828014-LULU12ATWgedY57vrCFROChZ0BizdaG5VLhc93xl');
           $twitter_access_token_secret = env('TWITTER_ACCESS_TOKEN_SECRET', 'oOQlXTJUUgj0F6hHEKxgNV9CvYlqM98V7gyyblXbsdz9Z');
           return new TwitterStream($twitter_access_token, $twitter_access_token_secret, Phirehose::METHOD_FILTER);
       });
    }
}
