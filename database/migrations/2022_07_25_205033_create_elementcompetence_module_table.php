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

            Schema::create('elementcompetence_module', function (Blueprint $table) {
                $table->primary(['elementcompetence_id','module_id']);
                $table->unsignedBigInteger('elementcompetence_id');
                $table->unsignedBigInteger('module_id');
                $table->foreign('elementcompetence_id')->references('id')->on('elementcompetences')->onDelete('cascade');
                $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
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
        Schema::dropIfExists('elementcompetence_module');
    }
};
