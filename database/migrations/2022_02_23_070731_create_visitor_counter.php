<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorCounter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_counter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('year');
            $table->integer('month');
            $table->integer('day');
            $table->date('date');
            $table->integer('total')->nullable()->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_counter');
    }
}
