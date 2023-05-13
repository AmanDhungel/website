<?php

namespace App\Repositories\Roles;

use App\Models\Roles\Menu;
use App\SInterFace\Roles\MenuRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MenuRepository implements MenuRepositoryInterface
{
    public static function getAccessMenu($id, $type_id)
    {
        $result = Menu::query();
        //check super admin admin user type for menu management
        if (userInfo()->role_id > 1) {
            $result = $result
                ->whereNotIn('menus.id', [4]);
        }

        return $result
            ->join('user_roles', 'menus.id', '=', 'user_roles.menu_id')
            ->where(['parent_id' => $id, 'menu_status' => 1, 'role_id' => $type_id])
            ->select(
                'user_roles.id as group_role_id',
                'role_id',
                'menu_id',
                'allow_index',
                'allow_add',
                'allow_edit',
                'allow_delete',
                'allow_show',
                'menus.*'
            )
            ->orderBy('menu_order', 'ASC')
            ->get();
    }

    public static function getMenu($id)
    {
        //check super admin  user type for menu management
        if (userInfo()->role_id == 1) {
            $result = Menu::query()
                ->where(['parent_id' => $id,
                    'menu_status' => 1,
                ])
                ->where('id', '<>', 4);
        } else {
            $result = Menu::query()
                ->select('menus.*')
                ->join('user_roles', 'menus.id', '=', 'user_roles.menu_id')
                ->where(['parent_id' => $id, 'menu_status' => 1, 'allow_index' => true, 'role_id' => userInfo()->role_id])
                ->where('menus.id', '<>', 4);
        }

        return $result
            ->orderBy('menu_order', 'ASC')
            ->get();
    }

    public static function getMenus(): \Illuminate\Support\Collection
    {
        $data = DB::table('menus')->select('menus.*');
        //check super admin  user type for menu management
        if (userInfo()->role_id > 1) {
            $data = $data
                ->where('role_id', userInfo()->role_id)
                ->join('user_roles', 'menus.id', '=', 'user_roles.menu_id')
                ->where(['parent_id' => 0, 'menu_status' => 1, 'allow_index' => true])
                ->where('menus.id', '<>', 4);
        }

        return $data
            ->orderBy('menu_order', 'ASC')
            ->get();
    }

    public static function getMenuLink($controllerName)
    {
        return Menu::select('menu_link', 'parent_id')
            ->where('menu_controller', $controllerName)
            ->first();
    }
}
