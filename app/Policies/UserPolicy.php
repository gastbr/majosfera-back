<?php

namespace App\Policies;

use App\Models\User;

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determina si un usuario puede ver la lista de usuarios.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determina si un usuario puede ver los detalles de otro usuario.
     */
    public function view(User $user, User $model): bool
    {
        return $user->role === 'admin' || $user->id === $model->id;
    }

    /**
     * Determina si un usuario puede crear nuevos usuarios.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determina si un usuario puede actualizar a otro usuario.
     */
    public function update(User $user, User $model): bool
    {
        return $user->role === 'admin' || $user->id === $model->id;
    }

    /**
     * Determina si un usuario puede eliminar a otro usuario.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->role === 'admin' && $user->id !== $model->id;
    }

    /**
     * Determina si un usuario puede restaurar un usuario eliminado.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determina si un usuario puede eliminar permanentemente a otro usuario.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }
}
