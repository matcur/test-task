<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\PageInfo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('homePageInfo', Page::where('name', 'home')->first());
    }
}
