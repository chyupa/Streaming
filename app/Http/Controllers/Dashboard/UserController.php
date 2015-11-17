<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\UserMetadataRequest;
use App\User;
use App\UserMetadata;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditUser( User $user )
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * @param User $user
     * @param UserMetadataRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * TODO: refactor this because it looks ugly as shit
     */
    public function postEditUser(User $user, UserMetadataRequest $request )
    {
        $userMetadata = $user->userMetadata;
        if( $userMetadata )
        {
            $userMetadata->name = $request->get('name');
            $user->userMetadata()->save( $userMetadata );
        }
        else
        {
            $userMetadata = new UserMetadata([
                "name" => $request->get('name')
            ]);
            $user->userMetadata()->save( $userMetadata );
        }

        return redirect()->route('admin.show.users');
    }
}
