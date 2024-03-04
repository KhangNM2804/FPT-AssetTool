<?php

namespace App\Policies;

use App\Models\CategoryRoom;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryRoomPolicy
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
        return $user->getPermissionsViaRoles()->contains('name', 'categoryrooms.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryRoom  $categoryRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CategoryRoom $categoryRoom)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'categoryrooms.show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'categoryrooms.store');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryRoom  $categoryRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CategoryRoom $categoryRoom)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'categoryrooms.update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryRoom  $categoryRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CategoryRoom $categoryRoom)
    {
        return $user->getPermissionsViaRoles()->contains('name', 'categoryrooms.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryRoom  $categoryRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CategoryRoom $categoryRoom)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CategoryRoom  $categoryRoom
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CategoryRoom $categoryRoom)
    {
        //
    }
}
