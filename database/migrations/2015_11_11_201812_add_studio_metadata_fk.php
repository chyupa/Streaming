<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudioMetadataFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("studios_metadata", function(Blueprint $table){
//           $table->foreign("_user_id")->references("_id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("studios_metadata", function(Blueprint $table){
//           $table->dropForeign("studios_metadata__user_id_foreign");
        });
    }
}
