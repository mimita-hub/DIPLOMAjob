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
        Schema::create('elementcompetences', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->string('code');
            $table->longtext('objectif')->nullable();
            $table->enum('niveau', ['Base', 'Intermédiaire','Avancé'])->nullable();
            $table->unsignedBigInteger('competence_id');
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');
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
        Schema::dropIfExists('elementcompetences');
    }
};
