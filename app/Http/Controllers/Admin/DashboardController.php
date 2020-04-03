<?php

namespace App\Http\Controllers\Admin;

use App\Action;
use App\Application;
use App\Http\Controllers\Controller;
use App\Location;
use App\Option;
use App\Status;
use App\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::get();
        $options = Option::get();
        $progress_actions = Action::get();

        $data = collect([
            'counters' => [
                'applications' => Application::count(),
                'users' => User::count(),
                'locations' => Location::count(),
            ],
            'statuses' => $statuses,
            'progress_actions' => $progress_actions,
            'options' => [
                'ghosted_days' => $options->contains('name', 'ghosted_days') ? $options->where('name', 'ghosted_days')->pluck('value')->first() : null,
                'default_application_status' => $options->contains('name', 'default_application_status') ? $options->where('name', 'default_application_status')->pluck('value')->first() : null,
                'application_ghosted_status' => $options->contains('name', 'application_ghosted_status') ? $options->where('name', 'application_ghosted_status')->pluck('value')->first() : null,
                'closed_application_status' => $options->contains('name', 'closed_application_status') ? $options->where('name', 'closed_application_status')->pluck('value')->first() : null,
                'open_application_status' => $options->contains('name', 'open_application_status') ? $options->where('name', 'open_application_status')->pluck('value')->first() : null,
            ]
        ]);

        return view('admin.index', compact('data', 'options'));
    }
}
