<?php

namespace App\Providers;

use App\Application;
use App\Note;
use App\Policies\ApplicationPolicy;
use App\Policies\NotePolicy;
use App\Policies\ProgressPolicy;
use App\Policies\ResumePolicy;
use App\Progress;
use App\Resume;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Resume::class => ResumePolicy::class,
        Application::class => ApplicationPolicy::class,
        Progress::class => ProgressPolicy::class,
        Note::class => NotePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
