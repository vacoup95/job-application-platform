<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResumeStoreRequest;
use App\Resume;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes = Resume::where('user_id', '=', Auth()->user()->id)->get();
        return view('resume.index', compact('resumes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ResumeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResumeStoreRequest $request)
    {
        $path = Storage::putFile('resumes', $request->file('resume'));
        Resume::create([
            'name' => $request->name,
            'file' => $path,
            'user_id' => Auth()->user()->id
        ]);
        return Redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resume $resume
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Resume $resume)
    {
        $this->authorize('access', $resume);
        $resume->delete();
        return Redirect()->back();
    }
}