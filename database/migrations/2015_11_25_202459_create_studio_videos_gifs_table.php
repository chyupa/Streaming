<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudioVideosGifsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("studio_videos_gifs", function (Blueprint $table) {
      $table->increments("id");
      $table->integer("studio_video_id")->unsigned();
      $table->string("name");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop("studio_videos_gifs");
  }
}
