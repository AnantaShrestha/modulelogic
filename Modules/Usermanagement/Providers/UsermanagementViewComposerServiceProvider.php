<?php

namespace Modules\Usermanagement\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Usermanagement\Http\UsermanagementViewComposer\AdminrouteComposer;
class UsermanagementViewComposerServiceProvider extends ServiceProvider
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
                'usermanagement::permission.includes.permission-list',
            ],
            AdminrouteComposer::class
        );
    }
}
