<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesCommentsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_comments_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_product_id')->references('id')->on('comments_product')->onDelete('cascade'); 
            $table->string('path'); 
            $table->string('thumbnail')->nullable(); 
            $table->string('alt')->nullable(); 
            $table->integer('sort')->default(0); 
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
        Schema::dropIfExists('images_comments_product');
    }
}
