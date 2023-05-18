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
                'app_name' => 'HRDC Web Admin',
                'app_short_name' => 'HRDC',
                'login_attempt_limit' => '5',
                'login_title' => 'Sign In to start your session',
                'session_expire_time' => 60,
                'office_address' => 'Bheri Na. Pa -4, Jajarkot',
                'office_phone' => '089-430089',
                'office_email_address' => 'hrdcjajarkot@gmail.com',
            ],
        ];
        DB::table('app_settings')->insert($rows);
    }
}
