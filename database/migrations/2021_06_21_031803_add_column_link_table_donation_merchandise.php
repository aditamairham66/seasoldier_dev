<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnLinkTableDonationMerchandise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('donation_merchandise')) {
            Schema::table('donation_merchandise', function (Blueprint $table) {
                $table->string('link', 255)->nullable();
                $table->integer('price')->nullable()->change();
            });
        }

        if (Schema::hasTable('donation_fundraising')) {
            Schema::table('donation_fundraising', function (Blueprint $table) {
                $table->string('link', 255)->nullable();
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
        if (Schema::hasTable('donation_merchandise')) {
            Schema::table('donation_merchandise', function (Blueprint $table) {
                $table->dropColumn('link');
                $table->decimal('price', 22, 2)->nullable()->change();
            });
        }

        if (Schema::hasTable('donation_fundraising')) {
            Schema::table('donation_fundraising', function (Blueprint $table) {
                $table->dropColumn('link');
            });
        }
    }
}
