<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactMessage extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'full_name',
            'email',
            'subject',
            'message',
            'message_date',
            'message_reply_status',
            'message_reply_by',
            'message_reply_by',
            'message_reply_details',
            'message_reply_date',
            'deleted_by',
            'status',
        ];
}
