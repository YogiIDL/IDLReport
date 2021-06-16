<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('area_id');
            // $table->foreign('area_id')->references('id')->on('area');
            // $table->foreignId('area_id')->constrained('area.id');
            $table->timestamps();

            // $table->foreign('area_id')->references('id')->on('area')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $table->dropForeign(['area_id']);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('location');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
