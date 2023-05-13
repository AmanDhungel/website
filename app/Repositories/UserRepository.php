<?php

namespace App\Repositories;

use App\Models\User;
use App\SInterFace\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAll($request = null)
    {
        $query = User::query();
        if (! empty($request->role_id)) {
            $query->where('role_id', $request->role_id);
        }

        if (! empty($request->email)) {
            $query->where('email', $request->email);
        }

        if (! empty($request->login_user_name)) {
            $query->where('login_user_name', $request->login_user_name);
        }

        if ($request->status != null) {
            $query->where('status', $request->status);
        }

        $query = CommonRepository::getCommonData($request, $query);

        return $query
            ->whereNotIn('role_id', [1, 8, 9, 10, 11])
            ->where('id', '<>', auth()->user()->id)
            ->orderBy('full_name', 'ASC')
            ->paginate(10);
    }
}
