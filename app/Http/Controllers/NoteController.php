<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param NoteStoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(NoteStoreRequest $request)
    {
        $this->authorize('access', new Note($request->all()));
        Note::create($request->all());
        return Redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note $note
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Note $note)
    {
        $this->authorize('access', $note);
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Note $note
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('access', $note);

        $note->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $name = Str::singular($note->notable()->first()->getTable());
        return Redirect()->route($name . '.show', $note->notable_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note $note
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Note $note)
    {
        $this->authorize('access', $note);

        $note->delete();
        return Redirect()->back();
    }
}
