<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_product', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description', 300);
            $table->boolean('status')->default(0);
            $table->integer('raiting'); 
            $table->foreignId('user_id')->nullable()->references('id')->on('seo')->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->references('id')->on('product')->onDelete('cascade');
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
        Schema::dropIfExists('comment_product');
    }
}
