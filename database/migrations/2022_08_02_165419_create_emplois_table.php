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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->string('nompost');
            $table->string('nomentreprise');
            $table->string('nommetier');
            $table->enum('secteurdactivite', ['Informatique,Télécome,Internet', 'Banque,Assurance,Finance','Energie,Mines,Matière première','BTP,Construction,Immobilier','Servise','Industries','Fonction public,Administration','Distribution,Commerce']);
            $table->Integer('nombrepost');
            $table->enum('niveaupost', ['Débutant/Junior','Jeune diplomé','Confirmé/Expérimenté','Responsable équipe','Manager/Responsable département','Cadre dirigeant']);
            $table->enum('experiencedemandée', ['Sans expérience','Moins an','1 à 2 ans','3 à 5 ans','6 à 10 ans','plus à 10 ans ' ]);
            $table->enum('niveaudétude',['Licence (LMD),BAC+3','Master 1,Licence BAC+4','Master 2,Ingniorat,BAC+5','Doctorat','Certification','Formation Professionnelle','Universitaire sans diplome']);
            $table->enum('typecontrat',['CDD','CDI']);
            $table->string('lieu');
            $table->date('datedexpiration');
            $table->unsignedBigInteger('entreprise_id');
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
           
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
        Schema::dropIfExists('emplois');
    }
};
