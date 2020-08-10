<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_array=array(
            array(
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=>Hash::make('admin123'),
            ),
            array(
                'name'=>'admin1',
                'email'=>'admin1@admin.com',
                'password'=>Hash::make('admin123'),
            ),
        );
        DB::table('admins')->insert($admin_array);
    }
}
