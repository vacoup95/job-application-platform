<?php

namespace App\Http\Controllers;

use App\Action;
use App\CommunicationMethods;
use App\Application;
use App\Http\Requests\ApplicationStoreRequest;
use App\Http\Requests\ApplicationUpdateRequest;
use App\Location;
use App\Note;
use App\Resume;
use App\Status;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $applications = Application::where('user_id', '=', $userId)->get();

        return view('application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resumes = Resume::where('user_id', '=', Auth()->user()->id)->get();
        $communicationMethods = CommunicationMethods::all();
        return view('application.create', compact(['resumes', 'communicationMethods']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApplicationStoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(ApplicationStoreRequest $request)
    {
        $user = Auth::user();
        $date = strtotime($request->submissionDate);

        $application = Application::create([
            'status_id' => 1,
            'user_id' => $user->id,
            'resume_id' => $request->resume,
            'name' => $request->company,
            'website' => $request->website,
            'role' => $request->role,
            'application_url' => $request->applicationUrl,
            'application_send_at' => date('Y-m-d H:i:s', $date),
        ]);

        if($request->motivation) {
            $note = new Note([
                'name' => 'Motivation letter',
                'description' => $request->motivation
            ]);
        }
        $location = new Location([
            'street' => $request->street,
            'street_number' => $request->street_number,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
        ]);

        $application->notes()->save($note);
        $application->locations()->save($location);

        return Redirect()->route('application.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Application $application)
    {
        $this->authorize('access', $application);

        $resume = $application->resume()->first();
        $progresses = $application->progress()->orderBy('created_at', 'desc')->get();
        $notes = $application->notes()->notMotivation()->get();
        $motivation = $application->notes()->motivation()->first();
        $communicationMethods = CommunicationMethods::get();
        $statuses = Status::get();
        $status = $application->status()->first();
        $actions = Action::get();

        return view('application.show', compact('application', 'resume', 'motivation', 'notes', 'communicationMethods', 'progresses', 'statuses', 'status', 'actions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ApplicationUpdateRequest $request
     * @param Application $application
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ApplicationUpdateRequest $request, Application $application)
    {
        $this->authorize('access', $application);
        $application->update($request->only('status_id'));
        return Redirect()->back();
    }
}
