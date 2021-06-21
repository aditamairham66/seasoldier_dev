<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonationMerchandise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_merchandise', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->decimal('price', 22, 2)->nullable();
            $table->string('image', 255)->nullable();
        });

        Schema::create('donation_partner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('sort')->nullable();
        });

        Schema::create('donation_fundraising', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->longText('desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_merchandise');
        Schema::dropIfExists('donation_partner');
        Schema::dropIfExists('donation_fundraising');
    }
}
