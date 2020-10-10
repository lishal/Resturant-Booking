<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_booking', function (Blueprint $table) {
            $table->id();
            $table->integer('table_id');
            $table->integer('customer_id');
            $table->integer('restaurant_id');
            $table->time('arrival_time');
            $table->enum('status',['0', '1'])->default('0');
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
        Schema::dropIfExists('customer_booking');
    }
}
