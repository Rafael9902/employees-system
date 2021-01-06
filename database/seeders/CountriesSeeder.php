<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'id' => 1,
            'name' => 'Colombia',
        ]);

        DB::table('countries')->insert([
            'id' => 2,
            'name' => 'Estados Unidos',
        ]);
    }
}
