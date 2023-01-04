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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->text('commentaire');
            $table->integer('rating');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('specialite_id')->unablle();
            $table->foreign('specialite_id')->references('id')->on('specialites');
            $table->unsignedBigInteger('competence_id');
            $table->foreign('competence_id')->references('id')->on('competences');
            $table->unsignedBigInteger('elementcompetence_id');
            $table->foreign('elementcompetence_id')->references('id')->on('elementcompetences');

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
        Schema::dropIfExists('feedbacks');
    }
};
