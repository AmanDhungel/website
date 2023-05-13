<?php

namespace App\Models\SystemSetting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailSetting extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable =
        [
            'mail_driver',
            'mail_host_name',
            'mail_port',
            'mail_user_name',
            'mail_password',
            'mail_encryption',
            'mail_from_address',
            'status',
            'created_by',
        ];
}
