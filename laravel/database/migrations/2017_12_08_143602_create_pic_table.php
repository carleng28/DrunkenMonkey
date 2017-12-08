<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic', function (Blueprint $table) {
            $table->increments('pic_id_picture')->primary();
            $table->string('pic_st_picname', 80);
            $table->string('pic_st_type', 50);
            $table->string('pic_st_picture');
            $table->foreign('pic_id_user')->references('usr_id_user')->on('usr')->nullable();
            $table->foreign('pic_id_cocktail')->references('ckt_id_cocktail')->on('ckt')->nullable();
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
        Schema::dropIfExists('pic');
    }
}
