<?php

namespace App\Policies;

use App\Models\CategoryAsset;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryAssetPolicy
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
        return $user->getPermissionsViaRoles()->contains('name', 'categoryasset.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryAsset  $categoryAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CategoryAsset $categoryAsset)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'categoryasset.show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'categoryasset.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryAsset  $categoryAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CategoryAsset $categoryAsset)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'categoryasset.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryAsset  $categoryAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CategoryAsset $categoryAsset)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'categoryasset.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryAsset  $categoryAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CategoryAsset $categoryAsset)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryAsset  $categoryAsset
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CategoryAsset $categoryAsset)
    {
        //
    }
}
