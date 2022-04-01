<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home', function (Blueprint $table) {
            $table->id();
            $table->string('sidebar')->nullable();
            $table->string('sidebar_ar')->nullable();
            $table->text('header')->nullable();
            $table->text('header_ar')->nullable();
            $table->text('content')->nullable();
            $table->text('content_ar')->nullable();
            $table->string('highlight')->nullable();
            $table->string('highlight_ar')->nullable();
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
        Schema::dropIfExists('home');
    }
}
