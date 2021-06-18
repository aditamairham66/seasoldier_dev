<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexAllTableCms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('cms_dashboard')) {
            Schema::table('cms_dashboard', function (Blueprint $table) {
                $table->index(['id_cms_privileges'], 'index_1');
            });
        }

        if (Schema::hasTable('cms_logs')) {
            Schema::table('cms_logs', function (Blueprint $table) {
                $table->index(['id_cms_users'], 'index_1');
            });
        }

        if (Schema::hasTable('cms_menus')) {
            Schema::table('cms_menus', function (Blueprint $table) {
                $table->index(['id_cms_privileges'], 'index_1');
            });
        }

        if (Schema::hasTable('cms_menus_privileges')) {
            Schema::table('cms_menus_privileges', function (Blueprint $table) {
                $table->index(['id_cms_menus'], 'index_1');
                $table->index(['id_cms_privileges'], 'index_2');
            });
        }

        if (Schema::hasTable('cms_notifications')) {
            Schema::table('cms_notifications', function (Blueprint $table) {
                $table->index(['id_cms_users'], 'index_1');
            });
        }

        if (Schema::hasTable('cms_privileges_roles')) {
            Schema::table('cms_privileges_roles', function (Blueprint $table) {
                $table->index(['id_cms_privileges'], 'index_1');
                $table->index(['id_cms_moduls'], 'index_2');
            });
        }

        if (Schema::hasTable('cms_statistic_components')) {
            Schema::table('cms_statistic_components', function (Blueprint $table) {
                $table->index(['id_cms_statistics'], 'index_1');
            });
        }

        if (Schema::hasTable('cms_users')) {
            Schema::table('cms_users', function (Blueprint $table) {
                $table->index(['id_cms_privileges'], 'index_1');
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
        if (Schema::hasTable('cms_dashboard')) {
            Schema::table('cms_dashboard', function (Blueprint $table) {
                $table->dropIndex('index_1');
            });
        }

        if (Schema::hasTable('cms_logs')) {
            Schema::table('cms_logs', function (Blueprint $table) {
                $table->dropIndex('index_1');
            });
        }

        if (Schema::hasTable('cms_menus')) {
            Schema::table('cms_menus', function (Blueprint $table) {
                $table->dropIndex('index_1');
            });
        }

        if (Schema::hasTable('cms_menus_privileges')) {
            Schema::table('cms_menus_privileges', function (Blueprint $table) {
                $table->dropIndex('index_1');
                $table->dropIndex('index_2');
            });
        }

        if (Schema::hasTable('cms_notifications')) {
            Schema::table('cms_notifications', function (Blueprint $table) {
                $table->dropIndex('index_1');
            });
        }

        if (Schema::hasTable('cms_privileges_roles')) {
            Schema::table('cms_privileges_roles', function (Blueprint $table) {
                $table->dropIndex('index_1');
                $table->dropIndex('index_2');
            });
        }

        if (Schema::hasTable('cms_statistic_components')) {
            Schema::table('cms_statistic_components', function (Blueprint $table) {
                $table->dropIndex('index_1');
            });
        }

        if (Schema::hasTable('cms_users')) {
            Schema::table('cms_users', function (Blueprint $table) {
                $table->dropIndex('index_1');
            });
        }
    }
}
