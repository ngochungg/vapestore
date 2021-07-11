<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Information;

class InfomationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('information')->insert([
            ['key'=>'Phone', 'content'=>''],
            ['key'=>'Email', 'content'=>''],
            ['key'=>'Title', 'content'=>''],
            ['key'=>'Open', 'content'=>''],
            ['key'=>'Address', 'content'=>''],
            ['key'=>'Facebook Link', 'content'=>''],
            ['key'=>'YouTube Link', 'content'=>''],
        ]);
    }
}
