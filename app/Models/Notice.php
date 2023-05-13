<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'title',
            'descriptions',
            'file',
            'order',
            'published_date',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
        ];
}
