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
        Schema::create('metier_specialite', function (Blueprint $table) {
            $table->primary(['metier_id','specialite_id']);
            $table->unsignedBigInteger('metier_id');
            $table->unsignedBigInteger('specialite_id');
            $table->foreign('metier_id')->references('id')->on('metiers')->onDelete('cascade');
            $table->foreign('specialite_id')->references('id')->on('specialites')->onDelete('cascade');
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
        Schema::dropIfExists('specialite_metier');
    }
};
