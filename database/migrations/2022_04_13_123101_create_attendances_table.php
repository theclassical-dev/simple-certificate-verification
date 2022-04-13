<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('PepID');
            $table->string('name');
            $table->string('PhoneNo');
            $table->string('FacultyName');
            $table->string('date');
            $table->string('aday');
            $table->string('weeks');
            $table->string('status')->nullable();
            $table->integer('flag')->default(0);
            $table->integer('reminder')->default(0);
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
        Schema::dropIfExists('attendances');
    }
}
