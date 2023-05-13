<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsLetter extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'title',
            'details',
            'image',
            'order',
            'status',
            'created_by',
            'updated_by',
            'deleted_by',
        ];
}
