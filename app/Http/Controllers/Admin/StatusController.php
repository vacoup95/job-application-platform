<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::paginate(20);
        return view('admin.status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Status::create($request->only('name','description', 'btn_class'));
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommunicationMethods  $communicationMethods
     * @return \Illuminate\Http\Response
     */
    public function show(StatusController $statusController)
    {
        dd("test");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommunicationMethods  $communicationMethods
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusController $statusController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommunicationMethods  $communicationMethods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusController $statusController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommunicationMethods  $communicationMethods
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Status::findOrFail($id)->delete();
        return Redirect()->route('admin.status.index');
    }
}
