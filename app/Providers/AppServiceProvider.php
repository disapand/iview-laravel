<?php

namespace App\Providers;

use App\Observers\MemberObserver;
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
        //强制使用https
        \URL::forceScheme('https');
        \App\Models\Member::observe(MemberObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
