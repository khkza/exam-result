<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $permission = 'user-list';
        // return true;
        // dd(auth()->user()->role);
        return  auth()->user()->canAccess($permission);



    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        $permission = 'user-details';
        return  auth()->user()->canAccess($permission);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $permission = 'user-create';
        return  auth()->user()->canAccess($permission);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        $permission = 'user-edit';
        return  auth()->user()->canAccess($permission);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        $permission = 'user-delete';
        return  auth()->user()->canAccess($permission);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
       return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
       return false;
    }
}
