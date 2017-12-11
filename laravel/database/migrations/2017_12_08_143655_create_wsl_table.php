<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWslTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wsl', function (Blueprint $table) {
            $table->integer('wsl_id_user')->unsigned();
            $table->integer('wsl_id_drink')->unsigned();
            $table->primary(['wsl_id_user', 'wsl_id_drink']);
            $table->foreign('wsl_id_user')->references('usr_id_user')->on('usr');
            $table->foreign('wsl_id_drink')->references('drk_id_drink')->on('drk');
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
        Schema::dropIfExists('wsl');
    }
}
