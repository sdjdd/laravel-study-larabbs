<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Topic;
use App\Observers\TopicObserver;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        \Carbon\Carbon::setLocale('zh');

        Topic::observe(TopicObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
