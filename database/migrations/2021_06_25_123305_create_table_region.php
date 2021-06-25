<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('image', 255)->nullable();
        });

        Schema::create('region_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('region_id')->nullable();
            $table->string('instagram_url', 255)->nullable();
            $table->string('instagram_name', 255)->nullable();
            $table->string('instagram_image', 255)->nullable();
            $table->string('instagram_content', 255)->nullable();
        });

        Schema::create('region_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date_request')->nullable();
            $table->string('city', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 255)->nullable();
        });

        Schema::create('email_subscribe', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date_subscribe')->nullable();
            $table->string('email', 255)->nullable();
        });

        if (Schema::hasTable('region_media')) {
            Schema::table('region_media', function (Blueprint $table) {
                $table->index(['region_id'], 'index_1');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('region');
        Schema::dropIfExists('region_media');
        Schema::dropIfExists('region_request');
        Schema::dropIfExists('email_subscribe');
    }
}
