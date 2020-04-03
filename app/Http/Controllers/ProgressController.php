<?php

namespace App\Http\Controllers;

use App\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('store', new Progress($request->all()));

        Progress::create($request->all());
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progress $progress
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Progress $progress)
    {
        $this->authorize('access', $progress);

        $notes = $progress->notes()->get();
        return view('progress.show', compact('progress', 'notes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progress $progress
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Progress $progress)
    {
        $this->authorize('access', $progress);

        $application_id = $progress->company_id;
        $progress->notes()->delete();
        $progress->delete();

        return Redirect()->route('application.show', $application_id);
    }
}
