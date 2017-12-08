<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usr', function (Blueprint $table) {
            $table->increments('usr_id_user');
            $table->string('usr_st_fname', 45);
            $table->string('usr_st_lname', 45);
            $table->string('usr_dt_birth', 45);
            $table->string('usr_st_email', 45);
            $table->string('usr_st_password', 45);
            $table->string('usr_st_gender', 45);
            $table->string('usr_dt_register', 45);
            $table->string('usr_st_province', 45);
            $table->string('usr_st_city', 45);
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
        Schema::dropIfExists('usr');
    }
}
