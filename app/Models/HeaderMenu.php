<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderMenu extends Model
{
    use HasFactory;
    protected $fillable=['id','parent_id','menu_name','menu_type','module_type_id','menu_url','order','status'];
}
