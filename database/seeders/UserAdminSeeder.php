<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Admin','username'=>'admin', 'email'=>'admin@example.com','password'=>Hash::make('P@ssw0rd'),'role'=>'2','image_path'=>'https://graph.facebook.com/v3.3/3005161883076041/picture?type=normal'],
        ]);
    }
}
