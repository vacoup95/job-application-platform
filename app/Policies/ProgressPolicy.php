<?php

namespace App\Policies;

use App\Progress;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgressPolicy
{
    use HandlesAuthorization;

    public function store(User $user, Progress $progress)
    {
        $applications = $user->applications()->pluck('id');
        if(isset($progress->application_id)) {
            return $applications->contains($progress->application_id);
        }
        return false;
    }

    public function access(User $user, Progress $progress)
    {
        if(isset($progress->application_id) && $progress->application_id > 0) {
            $applications = $user->applications()->pluck('id');
            return $applications->contains($progress->application_id);
        }
        return false;
    }

}
