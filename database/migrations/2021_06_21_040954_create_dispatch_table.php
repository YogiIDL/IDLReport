<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatch', function (Blueprint $table) {
            $table->id();
            $table->string('kurir')->nullable();
            $table->string('nopol')->nullable();
            $table->string('tipe_mobil')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('minggu')->nullable();
            $table->string('nopickup')->nullable();
            $table->string('taskid')->nullable();
            $table->string('awb_first_pickup')->nullable();
            $table->string('berat_awb_first_pickup')->nullable();
            $table->string('awb_handover_outbound')->nullable();
            $table->string('berat_awb_handover_outbound')->nullable();
            $table->string('awb_handover_inbound')->nullable();
            $table->string('berat_awb_handover_inbound')->nullable();
            $table->string('awb_delivery')->nullable();
            $table->string('berat_awb_delivery')->nullable();
            $table->bigInteger('bensin')->nullable();
            $table->bigInteger('tol')->nullable();
            $table->bigInteger('parkir')->nullable();
            $table->bigInteger('lainlain')->nullable();
            $table->bigInteger('km_awal')->nullable();
            $table->bigInteger('km_isi')->nullable();
            $table->bigInteger('km_akhir')->nullable();
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
        Schema::dropIfExists('dispatch');
    }
}
