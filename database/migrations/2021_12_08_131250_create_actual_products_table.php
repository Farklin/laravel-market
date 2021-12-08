<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actual_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->on('products')->references('id')->ondele('cascade'); 
            $table->foreignId('actual_id')->on('actuals')->references('id')->ondele('cascade'); 
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
        Schema::dropIfExists('actual_products');
    }
}
