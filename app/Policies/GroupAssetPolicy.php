<?php

namespace App\Policies;

use App\Models\GroupAsset;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupAssetPolicy
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
        return $user->getPermissionsViaRoles()->contains('name', 'groupasset.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GroupAsset  $groupAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, GroupAsset $groupAsset)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'groupasset.show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'groupasset.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GroupAsset  $groupAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, GroupAsset $groupAsset)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'groupasset.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GroupAsset  $groupAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, GroupAsset $groupAsset)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'groupasset.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GroupAsset  $groupAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, GroupAsset $groupAsset)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\GroupAsset  $groupAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, GroupAsset $groupAsset)
    {
        //
    }
}
