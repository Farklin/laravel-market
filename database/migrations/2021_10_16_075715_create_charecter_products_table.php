<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharecterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charecter_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->on('product')->cascade();
            $table->foreignId('charecter_id')->nullable()->on('charectres')->cascade();
            $table->string('value')->default('');
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
        Schema::dropIfExists('charecter_products');
    }
}
