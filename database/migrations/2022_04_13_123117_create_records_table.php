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
            $table->String('Ip');
            $table->String('State');
            $table->String('LGA');
            $table->String('Datim_Code');
            $table->String('FacilityName');
            $table->String('PepId');
            $table->String('Sex');
            $table->String('ARTStartDate');
            $table->String('DAYsOnArt');
            $table->String('LastPickupdate');
            $table->String('Clinic_Visit_Lastdate');
            $table->String('DaysofARVRefill');
            $table->String('RegimenLineAtARTStart');
            $table->String('RegimenAtARTStart');
            $table->String('CurrentRegimenLine');
            $table->String('CurrentARTRegimen');
            $table->String('CurrentPregnancyStatus');
            $table->String('CurrentViralLoad');
            $table->String('DateofCurrentViralLoad');
            $table->String('DateResultReceivedFacility');
            $table->String('LastDateOfSampleCollection');
            $table->String('ViralLoadIndication');
            $table->String('CurrentARTStatus');
            $table->String('CurrentARTStatus_Visit');
            $table->String('DOB');
            $table->String('Current_Age');
            $table->String('Current_AgeMonths');
            $table->String('TI');
            $table->String('Date_Transfered_In');
            $table->String('PhoneNo');
            $table->String('Address');
            $table->String('NextAppointment_Filled');
            $table->String('NextAppointment');
            $table->String('PBS');
            $table->String('PBSDateCreated');
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
