<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioVideoImagePreview extends Model
{
  protected $table = "studio_videos_image_previews";

  protected $fillable = [ "studio_video_id", "preview_name" ];

  public function studioVideo()
  {
    return $this->belongsTo("App\StudioVideo", "studio_video_id");
  }

}
