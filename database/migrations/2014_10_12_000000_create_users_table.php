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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('website');
            $table->string('city');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('password');
            $table->text('roles_name')->nullable();
            $table->string('Status')->nullable()->default("غير نشط");
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->timestamps();

//            $table->id();
//            $table->string('name');
//            $table->string('email')->unique();
//            $table->timestamp('email_verified_at')->nullable();
//            $table->string('password');
//            $table->rememberToken();
//            $table->foreignId('current_team_id')->nullable();
//            $table->string('profile_photo_path', 2048)->nullable();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
