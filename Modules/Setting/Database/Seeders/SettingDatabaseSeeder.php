<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //menu seeder
        DB::statement("INSERT INTO `admin_menus` (`id`, `parent_id`, `sort`, `title`, `icon`, `uri`, `created_at`, `updated_at`) VALUES
        (1, 0, 1, 'Dashboard', 'fas fa-align-justify', 'admin/dashboard', '2022-01-10 16:47:13', '2022-01-13 15:13:28'),
        (2, 0, 2, 'Usermanagement', 'fas fa-user', NULL, '2022-01-10 16:47:46', '2022-01-13 15:13:28'),
        (3, 0, 3, 'Setting', 'fas fa-cogs', NULL, '2022-01-10 16:48:17', '2022-01-13 15:13:28'),
        (4, 2, 1, 'Permission', NULL, 'admin/permission', '2022-01-10 16:48:47', '2022-01-13 15:13:28'),
        (5, 2, 2, 'Role', NULL, 'admin/role', '2022-01-10 16:49:00', '2022-01-13 15:13:28'),
        (6, 2, 3, 'User', NULL, 'admin/user', '2022-01-10 16:49:14', '2022-01-13 15:13:28'),
        (7, 3, 1, 'Menu Setting', NULL, 'admin/menu', '2022-01-10 18:22:41', '2022-01-13 15:13:28'),
        (11, 3, 2, 'Mail Setting', NULL, 'admin/mail-setting', '2022-01-12 18:51:27', '2022-01-13 15:13:28')");
    }
}   
