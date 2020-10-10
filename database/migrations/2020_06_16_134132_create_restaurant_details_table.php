<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_details', function (Blueprint $table) {
            $table->increments('restaurant_id');
            $table->string('restaurant_name');
            $table->string('restaurant_owner');
            $table->string('phone_number')->unique();
            $table->string('location');
            $table->text('description');
            $table->mediumText('image');
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
        Schema::dropIfExists('restaurant_details');
    }
}
