<?php

namespace App\Policies;

use App\Models\Blueprint;
use App\Models\User;

class BlueprintPolicy
{
    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user, Blueprint $blueprint): bool
    {
        // Only the owner of the blueprint can edit it
        return $blueprint->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blueprint $blueprint): bool
    {
        return $blueprint->user->is($user);
    }
}
