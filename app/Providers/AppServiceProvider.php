<?php

namespace App\Providers;

use App\Models\ReadingChallange;
use Illuminate\Support\ServiceProvider;

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
        view()->share('wait_challange_count',ReadingChallange::where('state',0)->count());

    }
}
