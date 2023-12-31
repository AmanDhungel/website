<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();
        $rows = [

            [
                'parent_id' => 0,
                'menu_name' => 'Roles Management',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_icon' => 'fa fa-key',
                'menu_order' => 13,
                'action_module_status' => false,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'menu_name' => 'Roles',
                'menu_link' => 'roleManagement/roles',
                'menu_controller' => 'RoleController',
                'menu_icon' => 'fa fa-user-plus',
                'menu_order' => 1,
                'action_module_status' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'menu_name' => 'Permissions',
                'menu_link' => 'roleManagement/permissions',
                'menu_controller' => 'PermissionController',
                'menu_icon' => 'fa fa-unlock',
                'menu_order' => 2,
                'action_module_status' => false,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'menu_name' => 'Menu Management',
                'menu_link' => 'roleManagement/menus',
                'menu_controller' => 'MenuController',
                'menu_icon' => 'fa fa-list',
                'menu_order' => 18,
                'action_module_status' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => '0',
                'menu_name' => 'Users Management',
                'menu_link' => 'users',
                'menu_controller' => 'UserController',
                'menu_icon' => 'fa fa-users',
                'menu_order' => 6,
                'action_module_status' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'menu_name' => 'System Setting',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_icon' => 'fa fa-tasks',
                'menu_order' => 15,
                'action_module_status' => false,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 6,
                'menu_name' => 'App Setting',
                'menu_link' => 'systemSetting/appSetting',
                'menu_controller' => 'AppSettingController',
                'menu_icon' => 'fa fa-bell',
                'menu_order' => 1,
                'action_module_status' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 6,
                'menu_name' => 'Mail Setting',
                'menu_link' => 'systemSetting/mailSetting',
                'menu_controller' => 'EmailSettingController',
                'menu_icon' => 'fa fa-envelope',
                'menu_order' => 2,
                'action_module_status' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id' => 0,
                'menu_name' => 'Master Setting',
                'menu_link' => '',
                'menu_controller' => '',
                'menu_icon' => 'fa fa-cogs',
                'menu_order' => 13,
                'action_module_status' => false,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id' => 9,
                'menu_name' => 'Designation',
                'menu_link' => 'masterSettings/designations',
                'menu_controller' => 'DesignationController',
                'menu_icon' => 'fa fa-user',
                'menu_order' => 3,
                'action_module_status' => false,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'menu_name' => 'Contact Message  Details',
                'menu_link' => 'contactMessageList',
                'menu_controller' => 'ContactMessageManagementController',
                'menu_icon' => 'fa fa-envelope',
                'menu_order' => 11,
                'action_module_status' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id' => 0,
                'menu_name' => 'Page Manager',
                'menu_link' => 'pagemanager',
                'menu_controller' => 'PageController',
                'menu_icon' => 'fa fa-home',
                'menu_order' => 2,
                'action_module_status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id' => 0,
                'menu_name' => 'Gallery Management',
                'menu_link' => 'galleryManagement',
                'menu_controller' => 'GalleryController',
                'menu_icon' => 'fa fa-tasks',
                'menu_order' => 9,
                'action_module_status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 0,
                'menu_name' => 'Header Menu Manager',
                'menu_link' => 'headermenu',
                'menu_controller' => 'HeaderMenuController',
                'menu_icon' => 'fa fa-list',
                'menu_order' => 1,
                'action_module_status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        DB::table('menus')->insert($rows);
    }
}
