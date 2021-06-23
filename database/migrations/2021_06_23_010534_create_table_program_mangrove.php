<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProgramMangrove extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_mangrove', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('sort')->nullable();
        });

        Schema::create('program_tree', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('sort')->nullable();
        });

        Schema::create('program_soldier', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('sort')->nullable();
        });

        Schema::create('program_shop', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
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
        Schema::dropIfExists('program_mangrove');
        Schema::dropIfExists('program_tree');
        Schema::dropIfExists('program_soldier');
        Schema::dropIfExists('program_shop');
    }
}
