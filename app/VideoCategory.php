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

    public function relatedCategories()
    {
        return $this->belongsToMany("App\VideoCategory", "related_categories", "_category_id", "_related_category_id");
    }

    public function addRelated( $category_id )
    {
        $this->relatedCategories()->attach($category_id);
        $category = VideoCategory::find($category_id);
        $category->relatedCategories()->attach($this->_id);
    }

    public function removeRelated( $category_id )
    {
        $this->relatedCategories()->detach($category_id);
        $category = VideoCategory::find($category_id);
        $category->relatedCategories()->dettach($category_id);
    }
}
