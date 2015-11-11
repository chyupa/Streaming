<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudioMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("studios_metadata", function(Blueprint $table){
            $table->increments("_id");
            $table->integer("_user_id")->unsigned();
            $table->string("name");
            $table->string("slug")->unique();
            $table->string("address");
            $table->string("phone");
            $table->string("contact_email")->unique();
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
        Schema::drop("studios_metadata");
    }
}
