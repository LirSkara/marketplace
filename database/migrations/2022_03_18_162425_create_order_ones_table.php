<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_ones', function (Blueprint $table) {
            $table->id();
            $table->string('product');
            $table->string('kolvo');
            $table->string('summ');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('sposob');
            $table->string('adress')->nullable();
            $table->string('tel');
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
        Schema::dropIfExists('order_ones');
    }
}
