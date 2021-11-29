<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_packets', function (Blueprint $table) {
            $table->id();
            $table->string('device');
            $table->string('time');
            $table->string('snr');
            $table->string('station');
            $table->string('data');
            $table->string('avgSnr');
            $table->string('lat');
            $table->string('lng');
            $table->string('rssi');
            $table->string('seqNumber');
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
        Schema::dropIfExists('data_packets');
    }
}
