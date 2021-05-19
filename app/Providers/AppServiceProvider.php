<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Client\PendingRequest;

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
        app('debugbar')->disable();

        view()->share('pageMeta', null);

        /**
         * Add the given headers to the request if the condition evauluates to true.
         *
         * @param  mixed  $condition
         * @param  array  $headers
         * @return PendingRequest
         */
        PendingRequest::macro('withHeadersIf', function($condition, array $headers) {

            if(! (bool) value($condition)) {
                return $this;
            }

            return tap($this, function () use ($headers) {
                $this->withHeaders($headers);
            });
        });
    }
}
