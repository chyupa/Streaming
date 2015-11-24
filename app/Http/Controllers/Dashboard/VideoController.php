<?php

namespace App\Http\Controllers\Dashboard;

use App\StudioVideo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getEditVideo(StudioVideo $studioVideo)
  {
    return view('admin.video.edit', compact('studioVideo'));
  }
}
