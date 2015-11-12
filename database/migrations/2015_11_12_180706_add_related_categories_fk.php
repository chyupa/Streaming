<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelatedCategoriesFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("related_categories", function(Blueprint $table){
           $table->foreign("_category_id")->references("_id")->on("video_categories")->onDelete("cascade");
           $table->foreign("_related_category_id")->references("_id")->on("video_categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("related_categories", function(Blueprint $table){
           $table->dropForeign("related_categories__category_id_foreign");
           $table->dropForeign("related_categories__related_category_id_foreign");
        });
    }
}
