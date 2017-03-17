<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->text('bio')->nullable();
            $table->string('occupation')->nullable();
            $table->string('website')->nullable();

            /**
             * 0 = not verified
             * 1 = normal user/patient - verified
             * 2 = doctor - bdmo not verified
             * 3 = doctor bdmo verified
             * 4 = moderator
             * 5 = admin
             */
            $table->integer('status')->default(0);

            /**
             * Doctor
             * status == 3
             */
            $table->text('availability')->nullable();
            $table->integer('available_for')->nullable();
            $table->string('hospital')->nullable();
            $table->unsignedInteger('bdmo_no')->nullable();
            $table->string('speciality')->nullable();

            $table->boolean('online')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
