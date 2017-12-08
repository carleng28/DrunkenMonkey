<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCkdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckd', function (Blueprint $table) {
            $table->primary(['ckd_id_cocktail', 'ckd_id_drink']);
            $table->foreign('ckd_id_cocktail')->references('ckt_id_cocktail')->on('ckt');
            $table->foreign('ckd_id_drink')->references('drk_id_drink')->on('drk');
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
        Schema::dropIfExists('ckd');
    }
}
