<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLevelAccessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_level_access', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_access_id');
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('level_access_id')->references('id')->on('level_access')->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('user_level_access');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
