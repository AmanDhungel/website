<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'header_title',
            'main_title',
            'main_title',
            'description',
            'image',
            'order',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
        ];
}
