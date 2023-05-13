<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'full_name',
            'email',
            'subject',
            'message',
            'subscribe_date',
            'deleted_by',
        ];
}
