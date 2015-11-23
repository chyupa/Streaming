<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StudioRequest;
use App\Http\Requests\StudioVideoRequest;
use App\StudioMetadata;
use App\StudioVideo;
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

  public function getEditStudio(User $user)
  {
    return view('admin.studio.edit', compact('user'));
  }

  public function postEditStudio(User $user, StudioRequest $request)
  {
    $studioMetadata = $user->studioMetadata;

    if ($studioMetadata) {
      $user->studioMetadata()->update([
        "name" => $request->get("name"),
        "address" => $request->get("address"),
        "phone" => $request->get("phone"),
        "contact_email" => $request->get("contact_email")
      ]);
    } else {
      $user->studioMetadata()->create([
        "name" => $request->get("name"),
        "address" => $request->get("address"),
        "phone" => $request->get("phone"),
        "contact_email" => $request->get("contact_email")
      ]);
    }

    return redirect()->route('admin.show.studios');
  }

  public function getEditStudioVideo(User $user)
  {
    return view('admin.studio.video', compact('user'));
  }

  public function postEditStudioVideo(User $user, StudioVideoRequest $request)
  {
    dd($request->all());
    $user->studioVideos->create([

    ]);
    if( $user->studioVideos )
    {
      $user->studioVideos()->update([

      ]);
    }
    else
    {
      $user->studioVideos()->create([
        "name" => $request->get('name'),
        "price" => $request->get('price'),
        "duration" => "",
        "price" => "",
        "url" => "",
        "type" => ""
      ]);
    }
  }
}
