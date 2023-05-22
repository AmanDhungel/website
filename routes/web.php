<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

include_once 'frontEnd/index.php';

include_once 'authCommon.php';

Route::group(['middleware' => ['auth']], function () {
    include_once 'admin/dashboard.php';
    include_once 'admin/roles.php';
    include_once 'admin/users.php';
    include_once 'admin/banner.php';
//    include_once 'admin/aboutUs.php';
    include_once 'admin/team.php';
    include_once 'admin/contactMessage.php';
    include_once 'admin/subscriber.php';
    include_once 'admin/systemSetting.php';
    include_once 'admin/subscriber.php';
    include_once 'admin/contactMessage.php';
    include_once 'admin/staffMember.php';
    include_once 'admin/executiveCommittee.php';
    include_once 'admin/gallery.php';
    include_once 'admin/video.php';
    include_once 'admin/page.php';
    include_once 'admin/partners.php';
    include_once 'admin/publication.php';
    include_once 'admin/program.php';
    include_once 'admin/annoucment.php';
    include_once 'admin/popup.php';
    include_once 'admin/headerMenu.php';

    Route::prefix('masterSettings')->group(function () {
        include_once 'masterSetting/cmsPage.php';
        include_once 'masterSetting/blogType.php';
        include_once 'masterSetting/designation.php';

    });
});

@require 'ajaxRoute.php';

Route::get('optimize', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    $data['status'] = 202;
    $data['status_code'] = 202;
    $data['message'] = 'All cache Clear !!!';

    return response()->view('errors.exception', $data);
});
