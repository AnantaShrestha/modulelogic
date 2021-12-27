<?php

namespace Modules\Usermanagement\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Usermanagement\Http\UsermanagementViewComposer\AdminrouteComposer;
use Modules\Usermanagement\Http\UsermanagementViewComposer\PermissionComposer;
use Modules\Usermanagement\Http\UsermanagementViewComposer\UserComposer;


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
        view()->composer(
            [
                'usermanagement::role.form',
            ],
            PermissionComposer::class
        );
        view()->composer(
            [
                'usermanagement::role.form',
            ],
            UserComposer::class
        );
    }
}
