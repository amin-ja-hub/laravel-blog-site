<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function AdminView(User $user)
    {
        return $user->role->name === 'admin';
    }
}