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
        Schema::create('competence_mission', function (Blueprint $table) {
            $table->primary(['competence_id','mission_id']);
            $table->unsignedBigInteger('competence_id');
            $table->unsignedBigInteger('mission_id');
            $table->timestamps();
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
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
        Schema::dropIfExists('competence_mission');
    }
};
