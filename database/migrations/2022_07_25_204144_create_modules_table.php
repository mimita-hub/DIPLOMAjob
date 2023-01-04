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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string("titre");
            $table->string("coeff");
            $table->string("credit");
            $table->Integer('C')->nullable();
            $table->Integer('TD')->nullable();;
            $table->Integer('TP')->nullable();;
            $table->string("unite");
            $table->string("vsh");
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('specialite_id')->unablle();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('modules');
    }
};
