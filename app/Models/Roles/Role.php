<?php

namespace App\Models\Roles;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'name_en',
            'name_np',
            'details',
            'status',
            'created_by',
            'updated_by',
            'deleted_by',
        ];

    protected $dates = ['deleted_at'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function userRoles(): HasMany
    {
        return $this->hasMany(UserRole::class);
    }
}
