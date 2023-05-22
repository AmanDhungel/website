<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeaderMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('header_menus')->truncate();
        $rows = [
            // about us
            [
                'parent_id'=>null,
                'menu_name' => 'About Us',
                'menu_type' => 'page',
                'module_type_id' => null,
                'menu_url' => 'about-us',
                'order' => 1,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>1,
                'menu_name' => 'Introduction',
                'menu_type' => 'page',
                'module_type_id' => null,
                'menu_url' => 'introduction',
                'order' => 1,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'parent_id'=>1,
                'menu_name' => 'Organizational Structure',
                'menu_type' => 'page',
                'module_type_id' => null,
                'menu_url' => 'organizational-structure',
                'order' => 2,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>1,
                'menu_name' => 'Executive Committee',
                'menu_type' => 'page',
                'module_type_id' => null,
                'menu_url' => 'executive-committee',
                'order' => 3,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>1,
                'menu_name' => 'Staff Members',
                'menu_type' => 'page',
                'module_type_id' => null,
                'menu_url' => 'staff-members',
                'order' => 4,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // end

            // programs
            [
                'parent_id'=>null,
                'menu_name' => 'Programs',
                'menu_type' => 'module',
                'module_type_id' => null,
                'menu_url' => 'front/program',
                'order' => 2,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>6,
                'menu_name' => 'Current Programs',
                'menu_type' => 'module',
                'module_type_id' => 1,
                'menu_url' => 'front/program/1',
                'order' => 1,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>6,
                'menu_name' => 'Past Programs',
                'menu_type' => 'module',
                'module_type_id' => 1,
                'menu_url' => 'front/program/2',
                'order' => 2,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // end

            // partners
            [
                'parent_id'=>null,
                'menu_name' => 'Partners',
                'menu_type' => 'module',
                'module_type_id' => null,
                'menu_url' => 'front/partner',
                'order' => 3,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>9,
                'menu_name' => 'Current Partners',
                'menu_type' => 'module',
                'module_type_id' => 1,
                'menu_url' => 'front/partner/1',
                'order' => 1,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>6,
                'menu_name' => 'Past Partners',
                'menu_type' => 'module',
                'module_type_id' => 1,
                'menu_url' => 'front/partner/2',
                'order' => 2,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // end

            // announcements
            [
                'parent_id'=>null,
                'menu_name' => 'Announcements',
                'menu_type' => 'module',
                'module_type_id' => null,
                'menu_url' => 'front/announcement',
                'order' => 4,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>12,
                'menu_name' => 'Vacancies',
                'menu_type' => 'module',
                'module_type_id' => 1,
                'menu_url' => 'front/announcement/1',
                'order' => 1,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>12,
                'menu_name' => 'General Announcements',
                'menu_type' => 'module',
                'module_type_id' => 2,
                'menu_url' => 'front/announcement/2',
                'order' => 2,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>12,
                'menu_name' => 'Procurement Notices',
                'menu_type' => 'module',
                'module_type_id' => 3,
                'menu_url' => 'front/announcement/3',
                'order' => 3,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // end

            // gallery
            [
                'parent_id'=>null,
                'menu_name' => 'Gallery',
                'menu_type' => 'module',
                'module_type_id' => null,
                'menu_url' => 'front/gallery',
                'order' => 5,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            //end

            //Publication
            [
                'parent_id'=>null,
                'menu_name' => 'Publications',
                'menu_type' => 'module',
                'module_type_id' => null,
                'menu_url' => 'front/publication',
                'order' => 6,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>17,
                'menu_name' => 'Media',
                'menu_type' => 'module',
                'module_type_id' => 1,
                'menu_url' => 'front/publication/1',
                'order' => 1,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>17,
                'menu_name' => 'Reports',
                'menu_type' => 'module',
                'module_type_id' => 2,
                'menu_url' => 'front/publication/2',
                'order' => 2,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id'=>17,
                'menu_name' => 'Case Studies',
                'menu_type' => 'module',
                'module_type_id' => 2,
                'menu_url' => 'front/publication/3',
                'order' => 3,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // end
            [
                'parent_id'=>null,
                'menu_name' => 'Contact Us',
                'menu_type' => 'module',
                'module_type_id' => null,
                'menu_url' => 'front/contactUs',
                'order' => 7,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('header_menus')->insert($rows);
    }
}
