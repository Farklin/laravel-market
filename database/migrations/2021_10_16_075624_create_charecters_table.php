<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharectersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charecters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('sorting');
            $table->foreignId('charecter_group_id')->nullable()->references('id')->on('charecter_groups')->onDelete('cascade');
            
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
        Schema::dropIfExists('charecters');
    }
}
