<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['r_name'=>'admin','r_display_name'=>'Quản trị hệ thống'],
            ['r_name'=>'article','r_display_name'=>'Quản lý tin tức'],
            ['r_name'=>'developer','r_display_name'=>'Phát triển hệ thống'],
            ['r_name'=>'content','r_display_name'=>'Quản lý nội dụng'],
        ]);
    }
}
