<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'Dev',
        ]);

        DB::table('teams')->insert([
            'name' => 'QA',
        ]);

        DB::table('teams')->insert([
            'name' => 'NOC',
        ]);
    }
}
