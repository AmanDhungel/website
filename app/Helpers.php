<?php

use App\Models\Roles\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Agent\Agent;

//allow add button
function allowAdd()
{
    return helperPermission()['isAdd'];
}

//allow edit button
function allowEdit()
{
    return helperPermission()['isEdit'];
}

//allow edit button
function allowDelete()
{
    return helperPermission()['isDelete'];
}

//allow index
function allowIndex()
{
    return helperPermission()['isIndex'];
}

//allow view button
function allowShow()
{
    return helperPermission()['isShow'];
}

function dataStatus(): array
{
    return [
        1 => trans('message.button.active'),
        0 => trans('message.button.inactive'),
    ];
}


/* CRUD Permission for blade file */
function helperPermission(): array
{
    //get Controller Name
    //get the access from database
    //set variable for add/edit/delete

    $action = app('request')->route()->getAction();

    /*
     * Splits the controller and store in array
     */
    $controllers = explode('@', class_basename($action['controller']));
    /*
     * Checks the existence of controller and method
     */

    $controller_name = $controllers[0] ?? '';

    $permission = [
        'isIndex' => false,
        'isAdd' => false,
        'isEdit' => false,
        'isShow' => false,
        'isDelete' => false, ];

    $value = Menu::join('user_roles', 'menus.id', '=', 'user_roles.menu_id')
        ->select('user_roles.*', 'menus.*')
        ->where([
            ['role_id', '=', userInfo()->role_id],
            ['menu_controller', '=', $controller_name],
        ])
        ->first();

    if ($value != null || userInfo()->role_id == 1) {
        /* access for super admin */
        if (userInfo()->role_id == 1) {
            $isIndex = true;
            $isAdd = true;
            $isEdit = true;
            $isDelete = true;
            $isShow = true;
        } else {
            $isIndex = $value->allow_index;
            $isAdd = $value->allow_add;
            $isEdit = $value->allow_edit;
            $isDelete = $value->allow_delete;
            $isShow = $value->allow_show;
        }
        $permission = [
            'isIndex' => $isIndex,
            'isAdd' => $isAdd,
            'isEdit' => $isEdit,
            'isDelete' => $isDelete,
            'isShow' => $isShow,
        ];
    }

    return $permission;
}

/*
 * Random Password Generate Function
 */
function rand_string($length): string
{
    $chars = 'ABC123abc$%456#*EFGHIJ789efghijklmn!mnopqrstKLMNOPQRSTuvwxyzUVWX(YZ)';

    return substr(str_shuffle($chars), 0, $length);
}

/* get all system setting */
function systemSetting()
{
    if (Schema::hasTable('app_settings')) {
        return \App\Models\SystemSetting\AppSetting::first();
    }
}

/* get logged in user info */
function userInfo(): ?Illuminate\Contracts\Auth\Authenticatable
{
    return Auth::user();
}
function setFont(): string
{
    return 'Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol';
}

function setDatePicker(): array
{
    return [
        'from_date' => 'from_date_en',
        'to_date' => 'to_date_en',
        'dateClass' => 'englishDatePicker',

    ];
}


function getIpLoginFailed()
{
    return LoginFails::select('login_fail_count')
        ->where([
            ['log_in_ip', '=', request()->ip()],
            ['user_id', '=', null],
            ['login_fail_count', '<>', null],
            ['log_fails_date', '=', date('Y-m-d')],
        ])
        ->count();
}
function short_hash($value, $length)
{
    return substr(md5($value), 0, $length);
}

function userProfilePath()
{
    return \App\Models\User::USER_PROFILE_PATH.'/';
}
