<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewLayoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_layout', function (Blueprint $table) {
            $table->id();
            $table->string('sidebar')->nullable();
            $table->string('sidebar_ar')->nullable();
            $table->text('content')->nullable();
            $table->text('content_ar')->nullable();
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
        Schema::dropIfExists('review_layout');
    }
}
