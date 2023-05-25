<?php

namespace Database\Seeders;

use Database\Seeders\MasterSettings\DesignationTableSeeder;
use Database\Seeders\SystemSettings\AppSettingTableSeeder;
use Database\Seeders\SystemSettings\MailSettingTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        // check foreign  key
        if (env('DB_CONNECTION') == 'mysql') {

        }
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AppSettingTableSeeder::class);
        $this->call(MailSettingTableSeeder::class);
        $this->call(DesignationTableSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(HeaderMenuSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
