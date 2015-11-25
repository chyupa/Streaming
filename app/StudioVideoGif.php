<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioVideoGif extends Model
{
  protected $table = "studio_videos_gifs";

  protected $fillable = [ "id", "studio_video_id", "name" ];

  public function studioVideo()
  {
    return $this->belongsTo("App\StudioVideo", "studio_video_id");
  }

}
