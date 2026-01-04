<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Team;

class TeamPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Team $team): bool
    {
        // Admin can access any team
        if ($user->hasRole('Admin')) return true;

        // Team Lead can only access teams they own
        if ($user->hasRole('Team Lead')) {
            return $user->ownsTeam($team);
        }

        // Developer and Staff can only access teams they belong to
        if ($user->hasAnyRole(['Developer', 'Staff'])) {
            return $team->hasUser($user);
        }

        return false;
    }

    public function update(User $user, Team $team): bool
    {
        if ($user->hasRole('Admin')) return true;

        return $team->users()
            ->where('users.id', $user->id)
            ->wherePivot('role', 'Team Lead')
            ->exists();
    }

    public function delete(User $user, Team $team): bool
    {
        return $this->update($user, $team);
    }

    public function manageMembers(User $user, Team $team): bool
    {
        if ($user->hasRole('Admin')) return true;

        return $team->users()
            ->where('users.id', $user->id)
            ->wherePivot('role', 'Team Lead')
            ->exists();
    }
}
