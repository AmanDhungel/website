<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use SoftDeletes;
    const ABOUT_PATH = 'uploads/about';

    protected $fillable =
        [
            'header_title',
            'main_title',
            'main_title',
            'description',
            'image',
            'created_by',
            'updated_by',
            'deleted_by',
            'status',
        ];
}
