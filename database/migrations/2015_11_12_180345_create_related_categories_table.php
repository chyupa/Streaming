<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("related_categories", function(Blueprint $table){
            $table->increments('id');
            $table->integer("_category_id")->unsigned();
            $table->integer("_related_category_id")->unsigned();
            $table->enum("main", [0, 1])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("related_categories");
    }
}
