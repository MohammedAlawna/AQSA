<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabpatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labpatients', function (Blueprint $table) {
            $table->id();
            $table->string('patientname')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('doctor')->nullable();
            $table->string('labtests')->nullable();
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
        Schema::dropIfExists('labpatients');
    }
}
