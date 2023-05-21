<?php

namespace App\Policies;

use App\Models\Auto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AutoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): bool
    {
        if($user === null)
        {
            return false;
        }
        elseif($user->role == "superadmin")
        {
            return true;
        }
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Auto $auto): bool
    {
        if($user->id == $auto->user_id)
        {
            return true;
        }
        elseif ($user->role == "superadmin" or $user->role == "editor")
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(?User $user, Auto $auto): bool
    {
        if ($user->role == "superadmin")
        {
            return true;
        }
        elseif($user->id == $auto->user_id)
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return false;
    }
}
