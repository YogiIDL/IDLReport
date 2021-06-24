<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatchs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('location_id');
            $table->string('task_id');
            $table->string('nama_kurir');
            $table->string('tipe_mobil_id');
            $table->date('tanggal')->nullable();
            $table->string('minggu')->nullable();
            $table->string('flow');
            // $table->string('no_awb');
            // $table->string('berat_awb');
            $table->bigInteger('bensin')->default('0');
            $table->bigInteger('tol')->default('0');
            $table->bigInteger('parkir')->default('0');
            $table->bigInteger('lainlain')->default('0');
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
        Schema::dropIfExists('dispatchs');
    }
}
