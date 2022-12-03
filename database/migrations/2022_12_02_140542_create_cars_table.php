<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('car_brand')->nullable();
            $table->string('car_model')->nullable();
            $table->integer('car_years')->nullable();
            $table->string('car_Engine_capacity')->nullable();
            $table->string('car_Transmission')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts');
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
        Schema::dropIfExists('cars');
    }
};
