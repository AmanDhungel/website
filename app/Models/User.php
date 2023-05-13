<?php

namespace App\Models;

use App\Models\Roles\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dates = ['deleted_at'];

    const USER_PROFILE_PATH = 'uploads/users/profiles';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
        [
            'role_id',
            'full_name',
            'full_name_np',
            'login_user_name',
            'email',
            'password',
            'image',
            'status',
            'address',
            'mobile_no',
            'created_by',
            'updated_by',
            'deleted_by',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
