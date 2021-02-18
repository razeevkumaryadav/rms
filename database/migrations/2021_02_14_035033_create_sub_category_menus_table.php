<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category_menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_menu_id');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('unit');
            $table->string('price');
            $table->string('food_type');
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
        Schema::dropIfExists('sub_category_menus');
    }
}
