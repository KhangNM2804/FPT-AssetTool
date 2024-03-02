<?php

namespace App\Policies;

use App\Models\AssetDetail;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssetDetailPolicy
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
        return $user->getPermissionsViaRoles()->contains('name', 'assetdetails.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AssetDetail $assetDetail)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'assetdetails.show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'assetdetails.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AssetDetail $assetDetail)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'assetdetails.update') && $assetDetail->asset->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AssetDetail $assetDetail)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'assetdetails.delete') && $assetDetail->asset->user_id == $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AssetDetail $assetDetail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AssetDetail  $assetDetail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AssetDetail $assetDetail)
    {
        //
    }
}
