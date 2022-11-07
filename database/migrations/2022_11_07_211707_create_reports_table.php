<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations. (Doctor Reports Table)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('appointid')->nullable(); //Appointment ID.
            $table->string('patientname')->nullable();
            $table->string('prescription')->nullable();
            $table->string('details')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('adate')->nullable(); //Appointment Date.
            $table->string('appt')->nullable(); //Appointment Time.
            $table->string('doctor')->nullable(); //Patient's Doctor.
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
        Schema::dropIfExists('reports');
    }
}
