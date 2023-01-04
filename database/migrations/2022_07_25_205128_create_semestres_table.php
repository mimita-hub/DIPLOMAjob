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

            Schema::create('semestres', function (Blueprint $table) {
                $table->id();
                $table->string('code');
                $table->unsignedBigInteger('module_id');
                $table->foreign('module_id')->references('id')->on('modules');
                $table->unsignedBigInteger('specialite_id');
                $table->foreign('specialite_id')->references('id')->on('specialites');

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
        Schema::dropIfExists('semestres');
    }
};
