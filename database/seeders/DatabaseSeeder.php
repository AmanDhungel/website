<?php

namespace Database\Seeders;

use Database\Seeders\MasterSettings\BlogTypeTableSeeder;
use Database\Seeders\MasterSettings\CmsPageTableSeeder;
use Database\Seeders\MasterSettings\DesignationTableSeeder;
use Database\Seeders\MasterSettings\PageTypeTableSeeder;
use Database\Seeders\MasterSettings\PortfolioTypeTableSeeder;
use Database\Seeders\SystemSettings\AppSettingTableSeeder;
use Database\Seeders\SystemSettings\MailSettingTableSeeder;
use Database\Seeders\SystemSettings\OtpSettingTableSeeder;
use Database\Seeders\SystemSettings\SmsSettingTableSeeder;
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
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        $this->call(MenusTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AppSettingTableSeeder::class);
        $this->call(MailSettingTableSeeder::class);
        $this->call(DesignationTableSeeder::class);
        $this->call(AnnouncementTypeTableSeeder::class);
        $this->call(PartnerTypeTableSeeder::class);
        $this->call(PublicationTypeTableSeeder::class);
        $this->call(ProgramTypeTableSeeder::class);
    }
}
