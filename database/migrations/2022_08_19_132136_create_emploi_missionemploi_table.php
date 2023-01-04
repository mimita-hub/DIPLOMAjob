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
        Schema::create('emploi_missionemploi', function (Blueprint $table) {
            $table->primary(['emploi_id','missionemploi_id']);
            $table->unsignedBigInteger('emploi_id');
            $table->unsignedBigInteger('missionemploi_id');
            $table->timestamps();
            $table->foreign('emploi_id')->references('id')->on('emplois')->onDelete('cascade');
            $table->foreign('missionemploi_id')->references('id')->on('missionemplois')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emploi_missionemploi');
    }
};
