<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StudioRequest;
use App\Http\Requests\StudioVideoRequest;
use App\StudioMetadata;
use App\StudioVideo;
use App\User;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use FFMpeg\Format\Video\WMV;
use FFMpeg\Format\Video\X264;
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
//    $ffmpeg = \FFMpeg\FFMpeg::create([
//        'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg',
//        'ffprobe.binaries' => '/usr/local/bin/ffprobe',
//        'timeout'          => 3600, // The timeout for the underlying process
//        'ffmpeg.threads'   => 12,
//    ]);
    $video_request = $request->video;
    $move_video = $video_request->move(storage_path("uploads/$user->_id"), $video_request->getClientOriginalName())->getPathname();

    $ffprobe = FFProbe::create();
    $video_duration = $ffprobe->format($move_video)->get('duration');
//    $video_ffmpeg = $ffmpeg->open($move_video);
//    $video_timecode_start = TimeCode::fromSeconds(0);
//    $video_timecode_end = TimeCode::fromSeconds(30);
////    dd($video_timecode);
//    $video_ffmpeg->filters()->clip($video_timecode_start, $video_timecode_end);
//    $video_ffmpeg->save(new X264("libfdk_aac"), storage_path("uploads/$user->_id/preview.mp4"));

//dd('12');
//    dd($user->studioVideos);
    if( ! $user->studioVideos->isEmpty() )
    {
//      dd(12);

      $user->studioVideos()->update([
        "name" => $request->get('name'),
        "price" => $request->get('price'),
      ]);
    }
    else
    {
//      dd(123);
      $user->studioVideos()->create([
        "name" => $request->get('name'),
        "price" => $request->get('price'),
        "duration" => $video_duration,
        "path" => $move_video,
        "url" => str_slug($request->get('name')),
        "type" => $video_request->guessClientExtension()
      ]);
    }

    return redirect()->route("admin.show.studios");
  }

  public function getStudioVideos(User $user)
  {
    $videos = $user->studioVideos;
    return view('admin.studio.videos', compact('videos'));
  }

}
