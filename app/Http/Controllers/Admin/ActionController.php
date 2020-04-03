<?php

namespace App\Http\Controllers\Admin;

use App\Action;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = ($id > 0) ? $id : $request->get('action_id');
        Action::find($id)->update([
            'status_id' => $request->status_id
        ]);
        return Redirect()->back();
    }
}
