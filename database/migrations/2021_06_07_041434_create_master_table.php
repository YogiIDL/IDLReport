<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('task_id');
            // $table->unsignedBigInteger('activity_id');
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('level_id')->references('id')->on('level')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('location_id')->references('id')->on('location')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('task_id')->references('id')->on('task')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('activity_id')->references('id')->on('activity')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('level_access_id')->references('id')->on('level_access')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('master');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
