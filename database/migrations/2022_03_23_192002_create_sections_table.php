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
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('sections_name', 255);
            $table->unsignedBigInteger('places_id');
            $table->foreign('places_id')->references('id')->on('places')->onDelete('cascade');
            $table->double('price', 15);
            $table->string('address', 100);
            $table->string('type',255);
            $table->string('description',255);
            $table->string('sections_logo', 2048);
            $table->string('services',255);
            $table->string('status',15);
            $table->date('date')->nullable();
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
        Schema::dropIfExists('sections');
    }
};
