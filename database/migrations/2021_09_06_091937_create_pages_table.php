<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('author')->nullable();
            $table->unsignedBigInteger('seo_id');
            $table->unsignedBigInteger('page_id')->nullable();
            $table->foreign('page_id')->nullable()->references('id')->on('pages')->onDelete('cascade');
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
        Schema::dropIfExists('pages');
    }
}
