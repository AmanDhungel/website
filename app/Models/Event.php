<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'title',
            'descriptions',
            'image',
            'order',
            'event_date',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
        ];
}
