<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    protected $table = "video_categories";

    protected $primaryKey = "_id";

    protected $fillable = ["name", "slug"];

    public function studioVideo()
    {
        return $this->belongsToMany("App\StudioVideo", "studio_video_categories", "_video_category_id", "_studio_video_id");
    }
}
