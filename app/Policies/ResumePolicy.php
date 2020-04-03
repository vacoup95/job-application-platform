<?php

namespace App\Policies;

use App\Resume;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResumePolicy
{
    use HandlesAuthorization;

    public function access(User $user, Resume $resume)
    {
        if(isset($resume->user_id) && isset($user->id)) {
            return $resume->user_id === $user->id;
        }
        return false;
    }
}
