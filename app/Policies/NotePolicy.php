<?php

namespace App\Policies;

use App\Application;
use App\Note;
use App\Progress;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    private $allowed_types;

    public function __construct()
    {
        $this->allowed_types = [
            'application' => 'App\Application',
            'progress' => 'App\Progress'
        ];
    }

    public function access(User $user, Note $note)
    {
        if(class_exists($note->notable_type) && in_array($note->notable_type, $this->allowed_types)) {
            $model = resolve($note->notable_type);
            $model = $model->find($note->notable_id);
            return isset($model) ? call_user_func_array(
                array($this, array_search($note->notable_type, $this->allowed_types)),
                array($model, $user)
            ) : false;
        }
        return false;
    }

    public function progress(Progress $progress, User $user)
    {
        $application = Application::find($progress->application_id);
        return $this->equal($application->user_id, $user->id);
    }

    public function application(Application $application, User $user)
    {
        return $this->equal($application->user_id, $user->id);
    }

    public function equal(Int $modelUserId, Int $userId)
    {
        return $modelUserId === $userId;
    }
}
