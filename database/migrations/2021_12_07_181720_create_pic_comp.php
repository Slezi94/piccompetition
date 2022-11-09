<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePicComp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pic_comps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pictures_id');
            $table->unsignedBigInteger('competitions_id');
            $table->foreign('pictures_id')->references('id')->on('pictures')->onDelete('cascade');
            $table->foreign('competitions_id')->references('id')->on('competitons')->onDelete('cascade');
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
        Schema::dropIfExists('pic_comp');
    }
}
