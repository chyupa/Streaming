<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudioVideo extends Model
{
  protected $table = "studio_videos";

  protected $primaryKey = "_id";

  protected $fillable = ["_user_id", "name", "price", "duration", "path", "url", "type"];

  public function user()
  {
    return $this->belongsTo("App\User", "_user_id");
  }

  public function videoCategories()
  {
    return $this->belongsToMany("App\VideoCategory", "studio_video_categories", "_studio_video_id", "_video_category_id");
  }

  public function getVideoPreviewPath()
  {
    $model_id = $this->model->_user_id;
    return storage_path("uploads/$model_id/preview.mp4");
  }


}