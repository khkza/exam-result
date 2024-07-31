<?php

namespace App\Policies;

use App\Models\Result;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ResultPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function list(User $user)
    {
        return $user->canAccess('result-list');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Result $result)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Result $result)
    {
        return $user->canAccess('result-edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Result $result)
    {
        return $user->canAccess('result-delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Result $result)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Department $department)
    {
        //
    }
}
