<?php

namespace Database\Seeders\SystemSettings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('app_settings')->truncate();
        $rows = [
            [
                'app_name' => 'Web Admin',
                'app_short_name' => 'Website',
                'login_attempt_limit' => '5',
                'login_title' => 'Sign In to start your session',
                'session_expire_time' => 60,
                'office_address' => 'Anamnagar,kathmandu',
                'office_phone' => '01-5539757',
                'office_email_address' => 'info@omnibluetech.com',
            ],
        ];
        DB::table('app_settings')->insert($rows);
    }
}
