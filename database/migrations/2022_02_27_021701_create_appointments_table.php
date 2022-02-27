<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('patientname')->nullable(); 
            $table->string('patientnumber')->nullable();
            $table->string('idcard')->nullable();
            $table->string('dob')->nullable();
            $table->string('adate')->nullable();
            $table->string('appt')->nullable();
            $table->string('department')->nullable();
            $table->string('_doctor')->nullable();
            $table->string('info')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
