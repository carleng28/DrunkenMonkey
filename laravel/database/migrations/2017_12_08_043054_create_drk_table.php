<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drk', function (Blueprint $table) {
            $table->unsignedInteger('drk_id_drink');
            $table->primary('drk_id_drink'); /*Drinks Id in the LCBO API*/
            $table->decimal('drk_dc_rate', 6, 2)->nullable();
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
        Schema::dropIfExists('drk');
    }
}
