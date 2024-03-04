<?php

namespace App\Policies;

use App\Models\Handover;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HandoverPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'handovers.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Handover  $handover
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Handover $handover)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'handovers.show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'handovers.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Handover  $handover
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Handover $handover)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'handovers.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Handover  $handover
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Handover $handover)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'handovers.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Handover  $handover
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Handover $handover)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Handover  $handover
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Handover $handover)
    {
        //
    }
}
