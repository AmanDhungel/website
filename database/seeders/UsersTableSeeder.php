<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $rows = [

            [
                'role_id' => 1,
                'full_name' => 'Super Admin',
                'login_user_name' => 'superadmin',
                'email' => 'superadmin@admin.com',
                'mobile_no' => 1234567564,
                'password' => bcrypt('Sup@123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'full_name' => 'Admin',
                'login_user_name' => 'admin',
                'email' => 'admin@admin.com',
                'mobile_no' => 1232345634,
                'password' => bcrypt('Admin@123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        DB::table('users')->insert($rows);
    }
}
