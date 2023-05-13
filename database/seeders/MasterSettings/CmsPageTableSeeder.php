<?php

namespace Database\Seeders\MasterSettings;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsPageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cms_pages')->truncate();
        $rows = [
            [
                'page_name' => 'Home',
                'page_code' => 'H',
                'order' => 1,
                'is_header_menu' => true,
                'parent_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'About',
                'page_code' => 'AU',
                'order' => 2,
                'is_header_menu' => true,
                'parent_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'Events',
                'page_code' => 'E',
                'order' => 3,
                'is_header_menu' => true,
                'parent_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'Blogs',
                'page_code' => 'B',
                'order' => 4,
                'is_header_menu' => true,
                'parent_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'Notices',
                'page_code' => 'N',
                'order' => 5,
                'is_header_menu' => true,
                'parent_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'Gallery',
                'page_code' => 'G',
                'order' => 6,
                'is_header_menu' => true,
                'parent_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'Contact',
                'page_code' => 'E',
                'order' => 7,
                'is_header_menu' => true,
                'parent_id' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'About Us',
                'page_code' => 'AU',
                'order' => 1,
                'is_header_menu' => true,
                'parent_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'page_name' => 'Our Team',
                'page_code' => 'OT',
                'order' => 2,
                'is_header_menu' => true,
                'parent_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'Organizational Structure',
                'page_code' => 'OS',
                'order' => 3,
                'is_header_menu' => true,
                'parent_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'Executive Committee',
                'page_code' => 'EC',
                'order' => 4,
                'is_header_menu' => true,
                'parent_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'page_name' => 'Staff Members',
                'page_code' => 'SM',
                'order' => 5,
                'is_header_menu' => true,
                'parent_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];
        DB::table('cms_pages')->insert($rows);
    }
}
