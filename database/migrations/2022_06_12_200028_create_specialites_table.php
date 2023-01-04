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
        Schema::create('specialites', function (Blueprint $table) {
            $table->id();
            $table->string('nomSpecialite');
            $table->longtext('description')->nullable();
            $table->longtext('objectifs')->nullable();
            $table->longtext('prerequis')->nullable();
            $table->longtext('secteurs')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('departement_id')->unablle();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('departement_id')->references('id')->on('departements');
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
        Schema::dropIfExists('specialites');
    }
};
