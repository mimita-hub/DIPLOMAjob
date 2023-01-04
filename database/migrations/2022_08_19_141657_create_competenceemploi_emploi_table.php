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
        Schema::create('competenceemploi_emploi', function (Blueprint $table) {
            $table->primary(['competenceemploi_id','emploi_id']);
            $table->unsignedBigInteger('competenceemploi_id');
            $table->unsignedBigInteger('emploi_id');
            $table->timestamps();
            $table->foreign('competenceemploi_id')->references('id')->on('competenceemplois')->onDelete('cascade');
            $table->foreign('emploi_id')->references('id')->on('emplois')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competenceemploi_emploi');
    }
};
