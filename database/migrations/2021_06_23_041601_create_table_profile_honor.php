<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfileHonor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_honor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('sort')->nullable();
        });

        Schema::create('profile_team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('highlight', 255)->nullable(); // Yes, No
            $table->string('name', 255)->nullable();
            $table->string('position', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('sort')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_honor');
        Schema::dropIfExists('profile_team');
    }
}
