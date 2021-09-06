<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('content');
            $table->string('author')->nullable();

            $table->unsignedBigInteger('seo_id');
            $table->unsignedBigInteger('rubric_id');
            $table->foreign('rubric_id')->nullable()->references('id')->on('rubrics')->onDelete('cascade');
            $table->foreign('seo_id')->nullable()->references('id')->on('seo')->onDelete('cascade');
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
        Schema::dropIfExists('articles');
    }
}
