<?php

namespace App\Models\MasterSettings;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'name',
            'short_name',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
        ];
}
