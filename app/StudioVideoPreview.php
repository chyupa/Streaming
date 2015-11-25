<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioVideoPreview extends Model
{
  protected $table = "studio_videos_previews";

  protected $fillable = [ "studio_video_id", "name" ];

  public function studioVideo()
  {
    return $this->belongsTo("App\StudioVideo");
  }

}
