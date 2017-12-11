<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRvwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rvw', function (Blueprint $table) {
            $table->increments('rvw_id_review');
            $table->string('rvw_st_review')->nullable();
            $table->decimal('rvw_dc_rate', 6, 2);
            $table->unsignedInteger('rvw_id_user');
            $table->unsignedInteger('rvw_id_drink');
            $table->foreign('rvw_id_user')->references('usr_id_user')->on('usr');
            $table->foreign('rvw_id_drink')->references('drk_id_drink')->on('drk');
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
        Schema::dropIfExists('rvw');
    }
}
