<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaveOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_menu_id');
            $table->bigInteger('sub_category_menu_id');
            $table->string('quantity');
            $table->string('food_type');
            $table->string('table_id');
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('save_orders');
    }
}
