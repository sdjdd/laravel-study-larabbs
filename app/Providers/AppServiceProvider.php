<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Topic;
use App\Models\Reply;
use App\Observers\TopicObserver;
use App\Observers\ReplyObserver;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        \Carbon\Carbon::setLocale('zh');

        Topic::observe(TopicObserver::class);
        Reply::observe(ReplyObserver::class);
        \App\Models\Link::observe(\App\Observers\LinkObserver::class);
        \App\Models\User::observe(\App\Observers\UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        if (app()->isLocal()) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }

        \API::error(function (\Illuminate\Auth\Access\AuthorizationException $exception) {
            abort(403, $exception->getMessage());
        });
    }
}
