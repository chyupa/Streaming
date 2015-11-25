<?php

namespace App\Http\Controllers\Dashboard;

use App\StudioVideo;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getEditVideo(User $user, StudioVideo $studioVideo)
  {
//    dd($studioVideo);
    if( $user->_id != $studioVideo->_user_id )
      abort(404);

    return view('admin.video.edit', compact('studioVideo'));
  }
}
