<?php

namespace Modules\Usermanagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsermanagementDatabaseSeeder extends Seeder
{
    public $adminPassword = '$2y$10$JcmAHe5eUZ2rS0jU1GWr/.xhwCnh2RU13qwjTPcqfmtZXjZxcryPO';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //user seeder
        \DB::connection('mysql')->table('users')->insert(
            [
                ['id' => '1', 'username' =>'admin','phone_no'=>'9861898666','password' => $this->adminPassword, 'email' => 'ianantashrestha@gmail.com', 'name' => 'Administrator', 'created_at' => date('Y-m-d H:i:s')],
            ]
        );

        //permission seeder
        \DB::statement("INSERT INTO `permissions` (`id`, `name`, `slug`, `access_uri`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
        (3, 'Full Access', 'full-access', 'admin/*', 1, NULL, NULL, '2021-12-26 17:16:30', '2021-12-26 17:16:30'),
        (4, 'User Management', 'user-management', 'admin/user/*,admin/permission/*,admin/role/*', 1, NULL, NULL, '2021-12-27 14:41:37', '2021-12-27 14:41:37'),
        (11, 'Menu Control', 'menu-control', 'admin/menu,admin/menu/edit/{id}', 1, NULL, NULL, '2022-01-11 15:40:10', '2022-01-11 18:00:53')");

        //Role seeder
        \DB::statement("INSERT INTO `roles` (`id`, `name`, `slug`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
        (1, 'System Admin', 'system-admin', 1, NULL, NULL, '2021-12-27 15:53:59', '2021-12-27 16:08:10'),
        (2, 'User Manager', 'user-manager', 1, NULL, NULL, '2021-12-27 16:24:16', '2021-12-27 16:24:16'),
        (3, 'Menu Control', 'menu-control', 1, NULL, NULL, '2022-01-11 15:40:35', '2022-01-11 15:40:35'),
        (4, 'Administrator', 'administrator', 1, NULL, NULL, '2022-01-11 16:33:12', '2022-01-11 16:33:12')");

        //ROle Permission seeder pivot table
        DB::statement("INSERT INTO `roles_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
        (5, 1, 3, NULL, NULL),
        (7, 2, 4, NULL, NULL),
        (8, 3, 11, NULL, NULL),
        (9, 4, 3, NULL, NULL)");

        //user role
        \DB::statement("INSERT INTO `users_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
            (5, 2, 3, NULL, NULL),
            (8, 4, 1, NULL, NULL)
        ");

    }
}
