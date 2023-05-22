<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pages')->truncate();
        $rows = [
            [
                'title' => 'About Us',
                'page_content' => 'About us',
                'page_url' => 'about-us',
                'created_date' => '2023-05-22',
                'status' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Introduction',
                'page_content' => 'Introduction',
                'page_url' => 'introduction',
                'created_date' => '2023-05-22',
                'status' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Organizational Structure',
                'page_content' => 'Organizational Structure',
                'page_url' => 'organizational-structure',
                'created_date' => '2023-05-22',
                'status' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Executive Committee',
                'page_content' => 'Executive Committee',
                'page_url' => 'executive-committee',
                'created_date' => '2023-05-22',
                'status' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Staff Members',
                'page_content' => 'Staff Members',
                'page_url' => 'staff-members',
                'created_date' => '2023-05-22',
                'status' => '1',
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('pages')->insert($rows);
    }
}
