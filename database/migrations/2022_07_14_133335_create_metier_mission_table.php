<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metier_mission', function (Blueprint $table) {
            $table->primary(['metier_id','mission_id']);
            $table->unsignedBigInteger('metier_id');
            $table->unsignedBigInteger('mission_id');
            $table->timestamps();
            $table->foreign('metier_id')->references('id')->on('metiers')->onDelete('cascade');
            $table->foreign('mission_id')->references('id')->on('missions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metier_mission');
    }
};
