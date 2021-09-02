<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('index'); 
            $table->string('phone')->nullable(); 
            $table->string('comment')->nullable();
            $table->decimal('amount', 10, 2)->unsigned(); 
            $table->decimal('delivery', 10, 2)->unsigned(); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete(); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
