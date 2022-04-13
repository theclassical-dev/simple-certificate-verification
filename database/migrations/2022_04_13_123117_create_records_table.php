<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->String('IP')->nullable();
            $table->String('State')->nullable();
            $table->String('LGA')->nullable();
            $table->String('Datim_Code')->nullable();
            $table->String('FacilityName')->nullable();
            $table->String('PepID')->nullable();
            $table->String('Sex')->nullable();
            $table->String('ARTStartDate')->nullable();
            $table->String('DaysOnART')->nullable();
            $table->String('LastPickupdate')->nullable();
            $table->String('Clinic_Visit_Lastdate')->nullable();
            $table->String('DaysofARVRefill')->nullable();
            $table->String('RegimenLineAtARTStart')->nullable();
            $table->String('RegimenAtARTStart')->nullable();
            $table->String('CurrentRegimenLine')->nullable();
            $table->String('CurrentARTRegimen')->nullable();
            $table->String('CurrentPregnancyStatus')->nullable();
            $table->String('CurrentViralLoad')->nullable();
            $table->String('DateofCurrentViralLoad')->nullable();
            $table->String('DateResultReceivedFacility')->nullable();
            $table->String('LastDateOfSampleCollection')->nullable();
            $table->String('ViralLoadIndication')->nullable();
            $table->String('CurrentARTStatus')->nullable();
            $table->String('CurrentARTStatus_Visit')->nullable();
            $table->String('DOB')->nullable();
            $table->String('Current_Age')->nullable();
            $table->String('Current_AgeMonths')->nullable();
            $table->String('TI')->nullable();
            $table->String('Date_Transfered_In')->nullable();
            $table->String('PhoneNo')->nullable();
            $table->String('Address')->nullable();
            $table->String('NextAppointment_Filled')->nullable();
            $table->String('NextAppointment')->nullable();
            $table->String('PBS')->nullable();
            $table->String('PBSDateCreated')->nullable();
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
        Schema::dropIfExists('records');
    }
}
