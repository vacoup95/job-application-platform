<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Store or update a resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveOrUpdate(Request $request)
    {
        $allowed = [
            'ghosted_days',
            'default_application_status',
            'closed_application_status',
            'open_application_status',
            'application_ghosted_status',
        ];

        if (isset($request->option_to_save) &&
            in_array((string) $request->option_to_save, $allowed))
        {
            $name = $request->option_to_save;
            $value = $request->{$name} ?? null;
            if (Option::name($name)->count() > 0) {
                Option::where('name', $name)->update([
                    'value' => $value
                ]);
            } else {
                Option::create([
                    'name' => $name,
                    'value' => $value,
                ]);
            }
        }
        return Redirect()->back();
    }
}
