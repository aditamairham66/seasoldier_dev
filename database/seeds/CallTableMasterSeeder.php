<?php

use Illuminate\Database\Seeder;

class CallTableMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // crudbooster moduls
        $this->call(Cms_usersSeeder::class);
        $this->call(Cms_modulsSeeder::class);
        $this->call(Cms_privilegesSeeder::class);
        $this->call(Cms_privileges_rolesSeeder::class);
        $this->call(Cms_settingsSeeder::class);
        $this->call(CmsEmailTemplates::class);
    }
}
