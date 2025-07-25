<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Supervisor;
use Illuminate\Auth\Access\HandlesAuthorization;

class SupervisorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_supervisor');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Supervisor $supervisor): bool
    {
        return $user->can('view_supervisor');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_supervisor');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Supervisor $supervisor): bool
    {
        return $user->can('update_supervisor');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Supervisor $supervisor): bool
    {
        return $user->can('delete_supervisor');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_supervisor');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Supervisor $supervisor): bool
    {
        return $user->can('{{ ForceDelete }}');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Supervisor $supervisor): bool
    {
        return $user->can('{{ Restore }}');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('{{ RestoreAny }}');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Supervisor $supervisor): bool
    {
        return $user->can('{{ Replicate }}');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('{{ Reorder }}');
    }
}
