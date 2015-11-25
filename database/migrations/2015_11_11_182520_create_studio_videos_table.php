<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudioVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("studio_videos", function(Blueprint $table){
            $table->increments("_id");
            $table->integer("_user_id")->unsigned();
            $table->string("name");
            $table->float("price");
            $table->string("duration");
            $table->string("path");
            $table->string("file_name");
            $table->string("url");
            $table->string("type");
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
        Schema::drop("studio_videos");
    }
}
