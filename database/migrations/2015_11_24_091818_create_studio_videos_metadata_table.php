<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudioVideosMetadataTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('studio_videos_metadata', function (Blueprint $table) {
      $table->increments('_id');
      $table->integer('studio_video_id')->unsigned();
      $table->string('path_original');
      $table->string('path_preview');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop("studio_videos_metadata");
  }
}
