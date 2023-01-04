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
        Schema::create('postules', function (Blueprint $table) {
            $table->id();
            $table->string('cv');
            $table->string('nometudiant');
            $table->string('nomuniversite');
            $table->string('filiere');
            $table->string('nomoffre');
            $table->unsignedBigInteger('emploi_id');
            $table->foreign('emploi_id')->references('id')->on('emplois')->onDelete('cascade');
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');
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
        Schema::dropIfExists('postules');
    }
};
