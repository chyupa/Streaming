<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudioVideoCategoriesFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("studio_video_categories", function(Blueprint $table){
//            $table->foreign("_studio_video_id")->references("_id")->on("studio_videos")->onDelete('cascade');
//            $table->foreign("_video_category_id")->references("_id")->on("video_categories")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("studio_video_categories", function(Blueprint $table){
//            $table->dropForeign("studio_video_categories__studio_video_id_foreign");
//            $table->dropForeign("studio_video_categories__video_category_id_foreign");
        });
    }
}
