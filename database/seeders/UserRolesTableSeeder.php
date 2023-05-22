<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->truncate();
        $rows = [
            [
                'role_id' => 2,
                'menu_id' => 1,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'role_id' => 2,
                'menu_id' => 2,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'role_id' => 2,
                'menu_id' => 3,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 5,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => true,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 6,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 7,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 8,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 9,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 10,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 11,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 12,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2,
                'menu_id' => 13,
                'allow_index' => true,
                'allow_add' => true,
                'allow_edit' => true,
                'allow_delete' => false,
                'allow_show' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        DB::table('user_roles')->insert($rows);
    }
}
