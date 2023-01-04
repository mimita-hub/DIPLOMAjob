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
        Schema::create('profilstage_stage', function (Blueprint $table) {
            $table->primary(['profilstage_id','stage_id']);
            $table->unsignedBigInteger('profilstage_id');
            $table->unsignedBigInteger('stage_id');
            $table->timestamps();
            $table->foreign('profilstage_id')->references('id')->on('profilstages')->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profilstage_stage');
    }
};
