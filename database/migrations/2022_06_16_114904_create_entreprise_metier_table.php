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
        Schema::create('entreprise_metier', function (Blueprint $table) {
            $table->primary(['entreprise_id','metier_id']);
            $table->unsignedBigInteger('entreprise_id');
            $table->unsignedBigInteger('metier_id');
            $table->timestamps();
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
            $table->foreign('metier_id')->references('id')->on('metiers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprise_metier');
    }
};
