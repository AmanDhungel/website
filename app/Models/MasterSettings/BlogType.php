<?php

namespace App\Models\MasterSettings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogType extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'name',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
        ];
}
