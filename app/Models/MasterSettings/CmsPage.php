<?php

namespace App\Models\MasterSettings;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CmsPage extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'page_name',
            'page_code',
            'order',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
            'is_header_menu',
            'parent_id',
        ];
}
