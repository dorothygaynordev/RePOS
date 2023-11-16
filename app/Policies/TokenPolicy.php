<?php

namespace App\Policies;

use App\Models\User;

class TokenPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user)
    {
        return $user->hasRole('admin'); // Reemplaza con tu lógica de autorización
    }
}
