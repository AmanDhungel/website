<?php

namespace App\Models\SystemSetting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppSetting extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =
        [
            'app_name',
            'app_name_np',
            'app_short_name',
            'app_short_name_np',
            'app_logo',
            'login_attempt_required',
            'login_attempt_limit',
            'login_title',
            'login_title_np',
            'login_captcha_required',
            'login_ip_address_required',
            'login_ip_address',
            'forget_password_required',
            'office_phone',
            'office_phone_1',
            'office_contact_person_name',
            'office_contact_person_number',
            'office_contact_person_number_1',
            'office_address',
            'office_location_lat',
            'office_location_lan',
            'office_map_address',
            'office_email_address',
            'office_facebook_link',
            'office_linkedin_link',
            'office_youtube_link',
            'office_insta_link',
            'office_twitter_link',
            'office_whatsup_link',
            'office_viber_link',
            'created_by',
            'updated_by',
            'deleted_by',
        ];
}
