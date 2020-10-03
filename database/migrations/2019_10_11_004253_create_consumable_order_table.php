<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumableOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('consumable_order', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('consumable_id')->references('id')->on('consumables')->onDelete('cascade')->unsigned();
        //     $table->string('price');
        //     $table->string('price');
        //     $table->integer('order_id')->references('id')->on('orders')->onDelete('cascade')->unsigned();
        //     $table->string('quantity');


        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumable_order');
    }
}
