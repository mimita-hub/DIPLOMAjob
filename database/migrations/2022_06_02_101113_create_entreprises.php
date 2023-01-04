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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nomEntreprise');
            $table->string('secteur_entreprise');
            $table->mediumText('description_entreprise');
            $table->string('lieu_entreprise');
            $table->string('téléphone');
            $table->string('adresse_mail_entreprise');
            $table->unsignedBigInteger('user_id')->unablle();;
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('entreprises');
    }
};
