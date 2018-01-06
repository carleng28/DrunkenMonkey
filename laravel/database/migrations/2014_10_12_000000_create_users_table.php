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
            $table->string('usr_st_fname', 45);
            $table->string('usr_st_lname', 45)->nullable();
            $table->date('usr_dt_birth');
            $table->string('email')->unique();
            $table->string('password', 45);
            $table->char('usr_st_gender', 2)->nullable();
            $table->datetime('usr_dt_register');
            $table->char('usr_st_province', 2)->nullable();
            $table->string('usr_st_city', 45)->nullable();
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
