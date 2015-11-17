<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StudioRequest;
use App\StudioMetadata;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getEditStudio( User $user )
    {
        return view('admin.studio.edit', compact('user'));
    }

    public function postEditStudio( User $user, StudioRequest $request )
    {
        $studioMetadata = $user->studioMetadata;
//        dd($studioMetadata);
        if( $studioMetadata )
        {
            $user->studioMetadata()->update([
                "name" => $request->get("name"),
                "address" => $request->get("address"),
                "phone" => $request->get("phone"),
                "contact_email" => $request->get("contact_email")
            ]);
        }
        else
        {
            $user->studioMetadata()->create([
                "name" => $request->get("name"),
                "address" => $request->get("address"),
                "phone" => $request->get("phone"),
                "contact_email" => $request->get("contact_email")
            ]);
        }

        return redirect()->route('admin.show.studios');
    }
}
