<?php

namespace Modules\Setting\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Setting\Http\SettingViewComposer\MenuOptionListComposer;
use Modules\Setting\Http\SettingViewComposer\MenuUrlListComposer;
use Modules\Setting\Http\SettingViewComposer\MenuComposer;
class SettingViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function boot()
    {
        view()->composer(
            [
                'setting::menu.form',
            ],
            MenuOptionListComposer::class
        );
        view()->composer(
            [
                'setting::menu.form',
            ],
            MenuUrlListComposer::class
        );
        view()->composer(
            [
                'backend.layouts.sidebar'
            ],
            MenuComposer::class
        );
    }
}
