<?php

namespace App\Policies;

use App\Application;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    public function access(User $user, Application $application)
    {
        if(isset($application->user_id) && isset($user->id)) {
            return $application->user_id === $user->id;
        }
        return false;
    }
}
