<?php

namespace App\Policies;

use App\Models\User;

use App\Models\Student;
use App\Policies\StudentPolicy;
use Illuminate\Auth\Access\Response;

class StudentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function list(User $user)
    {
        return $user->canAccess('student-list');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Student $student)
    {
       return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->canAccess('student-create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Student $student)
    {
        return $user->canAccess('student-edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Student $Student)
    {
        return $user->canAccess('student-delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Student $student)
    {
        //
    }
}
