<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCkiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cki', function (Blueprint $table) {
            $table->primary(['cki_id_cocktail', 'cki_id_ingredient']);
            $table->string('cki_st_measure', 45);
            $table->foreign('cki_id_cocktail')->references('ckt_id_cocktail')->on('ckt');
            $table->foreign('cki_id_ingredient')->references('igr_id_ingredient')->on('igr');
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
        Schema::dropIfExists('cki');
    }
}
