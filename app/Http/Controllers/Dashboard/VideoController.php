<?php

namespace App\Http\Controllers\Dashboard;

use App\StudioVideo;
use App\StudioVideoPreview;
use App\User;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFProbe;
use FFMpeg\Format\Video\X264;
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

  public function postCreatePreview(StudioVideo $studioVideo, Request $request)
  {
//    dd($request->all());
    $user = User::find($studioVideo->_user_id);
    $ffmpeg = \FFMpeg\FFMpeg::create([
      'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg',
      'ffprobe.binaries' => '/usr/local/bin/ffprobe',
      'timeout'          => 0, // The timeout for the underlying process
      'ffmpeg.threads'   => 12,
    ]);

    $video_ffmpeg = $ffmpeg->open($studioVideo->path);
//    dd($video_ffmpeg);
    $video_timecode_start = TimeCode::fromSeconds(0);
    $video_timecode_end = TimeCode::fromSeconds(30);
    $video_ffmpeg->filters()->clip($video_timecode_start, $video_timecode_end);
//    dd($video_ffmpeg);
    $video_ffmpeg->save(new X264("libfdk_aac"), public_path("uploads/$user->_id/preview.mp4"));

    if($video_ffmpeg)
    {
      $studioVideo->studioVideoPreview()->create([]);
    }

    return redirect()->back();
  }

  public function postCreateThumbnails(StudioVideo $studioVideo, Request $request)
  {
//    dd($request);
    $user = User::find($studioVideo->_user_id);
    $ffmpeg = \FFMpeg\FFMpeg::create([
      'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg',
      'ffprobe.binaries' => '/usr/local/bin/ffprobe',
      'timeout'          => 0, // The timeout for the underlying process
      'ffmpeg.threads'   => 12,
    ]);

    $video_ffmpeg = $ffmpeg->open($studioVideo->path);
    $ffprobe = FFProbe::create([
      "ffprobe.binaries" => '/usr/local/bin/ffprobe'
    ]);
    $video_duration = $ffprobe->format($studioVideo->path)->get('duration');
    $frame_duration = $video_duration / 10;
    $output_counter = 1;
    for($i = 0; $i < $video_duration; $i+=$frame_duration)
    {
      $timecode = TimeCode::fromSeconds($i);
      $output_no = str_pad($output_counter++, 3, '0', STR_PAD_LEFT);
      $video_ffmpeg->frame($timecode)->save(public_path("uploads/$user->_id/output$output_no.jpg"));
      if($video_ffmpeg)
      {
        $studioVideo->studioVideoImagePreview()->create([
          "preview_name" => "output$output_no.jpg"
        ]);
      }
    }

    return redirect()->back();
  }
}
