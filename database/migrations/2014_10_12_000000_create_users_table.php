<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('user_type');
            $table->string('role');
            $table->string('company');
            $table->string('job_title');
            $table->string('phone');
            $table->string('home_phone');
            $table->string('address');
            $table->string('city');
            $table->string('state_province');
            $table->string('zip_postal_code');
            $table->string('country_region');
            $table->string('photo');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}