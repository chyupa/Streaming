<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersMetadataFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users_metadata", function(Blueprint $table){
//           $table->foreign("_user_id")->references("_id")->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users_metadata", function(Blueprint $table){
//           $table->dropForeign("users_metadata__user_id_foreign");
        });
    }
}
