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
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('nomstage');
            $table->string('nomentreprise');
            $table->string('nommetier');
            $table->enum('secteurdactivite', ['Informatique,Télécome,Internet', 'Banque,Assurance,Finance','Energie,Mines,Matière première','BTP,Construction,Immobilier','Servise','Industries','Fonction public,Administration','Distribution,Commerce']);
            $table->Integer('nombrepost');
            $table->enum('niveaupost', ['Etudiant/Stagiaire','Débutant/Junior','Jeune diplomé','Confirmé/Expérimenté','Responsable équipe','Manager/Responsable département','Cadre dirigeant']);
            $table->enum('niveaudétude',['Licence (LMD),BAC+3','Master 1,Licence BAC+4','Master 2,Ingniorat,BAC+5','Doctorat','Certification','Formation Professionnelle','Universitaire sans diplome']);
            $table->string('lieu');
            $table->enum('periode',['3 mois','6 mois','1 an']);
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
        Schema::dropIfExists('stages');
    }
};
