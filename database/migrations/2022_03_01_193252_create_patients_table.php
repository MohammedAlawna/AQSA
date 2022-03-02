<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullble();
            $table->string('patientnumber')->nullable();
            $table->string('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('labtests')->nullable();
            $table->string('patientdoctor')->nullable();
            $table->string('patientdepartment')->nullable();
            $table->string('appointmentdate')->nullable();
            $table->string('appointmenttime')->nullable();
            $table->string('patientid')->nullable();
           
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
        Schema::dropIfExists('patients');
    }
}
