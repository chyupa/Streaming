<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudioVideoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("studio_videos", function(Blueprint $table){
           $table->foreign("_user_id")->references("_id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("studio_videos", function(Blueprint $table){
            $table->dropForeign("studio_videos__user_id_foreign");
        });
    }
}
