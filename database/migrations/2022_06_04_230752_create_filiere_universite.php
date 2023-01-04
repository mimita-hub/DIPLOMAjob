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
    {  Schema::create('filiere_universite', function (Blueprint $table) {
        $table->primary(['filiere_id','universite_id']);
        $table->unsignedBigInteger('universite_id');
        $table->unsignedBigInteger('filiere_id');
        $table->timestamps();
        $table->foreign('universite_id')->references('id')->on('universites')->onDelete('cascade');
        $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filiere_universite');
    }
};
