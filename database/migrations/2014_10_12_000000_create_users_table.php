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
            $table->string('address');
            $table->integer('phone');
            $table->date('birthday');

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
            $table->text('availability');
            $table->integer('available_for');
            $table->string('hospital');
            $table->unsignedInteger('bdmo_no');
            $table->string('speciality');

            $table->boolean('online');
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
