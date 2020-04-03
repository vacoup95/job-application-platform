<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, User $user)
    {
        $user = $user->findOrFail($request->profile);
        $location = $user->locations()->first() ?? null;
        return view('profile.edit', compact('user', 'location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        if((int) $request->profile == (int) Auth()->user()->id) {
            $user = $user->findOrFail($request->profile);
            $user->update($request->only(['name', 'email']));
            $user->locations()->first()->update($request->only(['street', 'street_number', 'city', 'zipcode']));
        }
        return Redirect()->back();
    }
}
